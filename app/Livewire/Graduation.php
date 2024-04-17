<?php

namespace App\Livewire;

use App\Service\FinanceService;
use Livewire\Component;

class Graduation extends Component
{
    public bool $hasOutstanding = false;

    public string $status = '';

    public function mount()
    {
        $user = auth()->user();

        $callFinanceService = FinanceService::getAccouunt($user->student_id);

        if ( $callFinanceService['status'] != 'success' ){
            return;
        }

        $hasOutstanding = $callFinanceService['data']['hasOutstandingBalance'];

        $this->hasOutstanding = $hasOutstanding;

        $this->status = $hasOutstanding
        ? 'Sorry you ineligible to graduate at the moment'
        : 'Congratulations you are eligible to graduate';

    }

    public function render()
    {
        return view('livewire.graduation')->extends('components.layouts.app');
    }
}
