<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Service\FinanceService;
use App\Service\LibrabyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public string $firstName = '';

    public string $surname = '';

    public string $username = '';

    public string $email = '';

    public string $password = '';

    protected $rules = [
        'username' => ['required', 'unique:users,username'],
        'email' => ['required', 'unique:users,email'],
        'password' => ['required', 'min:6'],
        'firstName' => ['required'],
        'surname' => ['required'],
    ];

    public function render()
    {
        return view('livewire.auth.register')->extends('components.layouts.app');
    }

    public function store()
    {
        $this->validate();

        $studentId = "c".rand(0,100).rand(1,5).rand(5,99).rand(0,10).rand(0, 100);

       $callFinanceService = FinanceService::createAccount($studentId);

        $callLibrabyService = LibrabyService::createAccount($studentId);
        
        if ( $callFinanceService['status'] != 'success' || $callLibrabyService['status'] != 'success'  ){
            $this->addError('username', 'Could not create acccount, try again.');
            return;
        }

    
        $user = User::query()->create([
            'first_name' => $this->firstName,
            'surname' => $this->surname,
            'password' => Hash::make($this->password),
            'email' => $this->email,
            'student_id' => $studentId,
            'username' => $this->username,
        ]);

        Auth::login($user);

        $this->redirectRoute('home');
    }
}
