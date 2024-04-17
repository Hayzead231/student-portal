<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Carbon;

class FinanceService
{
    private static function request(string $url, string $method, array $payload = [])
    {
        try{
            $response = Http::baseUrl(config('env.finance_api'))->$method($url, $payload);
        }catch(Exception $e){
            return null;
        }

        return ! $response->json()
        ? null
        : $response->json();
    }

    public static function createAccount(string $studentId)
    {
        $request = self::request('accounts', 'post', [
            'studentId' => $studentId,
        ]);

        return [
            'status' => ! $request ? 'fail' : 'success',
        ];
    }

    public static function getAccouunt(string $studentId)
    {
        $request = self::request("accounts/student/$studentId", 'get');

        return [
            'status' => ! $request ? 'fail' : 'success',
            'data' => ! $request ? null : $request,
        ];

    }

    public static function createInvoice(string $studentId, float $amount)
    {
        $request = self::request('invoices', 'post', [
            'amount' => $amount,
            'dueDate'=> Carbon::now()->addMonth()->format('Y-m-d'),
            'type' => 'TUITION_FEES',
            'account' => ['studentId' => $studentId],
        ]);

        return [
            'status' => ! $request ? 'fail' : 'success',
            'reference' => $request['reference'],
        ];
    }
}
