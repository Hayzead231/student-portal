<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Carbon;

class LibrabyService
{
    private static function request(string $url, string $method, array $payload = [])
    {
        try{
            $response = Http::baseUrl(config('env.libraby_api'))->$method($url, $payload);
        }catch(Exception $e){
            return null;
        }

        return ! $response->json()
        ? null
        : $response->json();
    }

    public static function createAccount(string $studentId)
    {
        $request = self::request('api/register', 'post', [
            'studentId' => $studentId,
        ]);

    
        return [
            'status' => ! $request ? 'fail' : 'success',
            
        ];
    }
}
