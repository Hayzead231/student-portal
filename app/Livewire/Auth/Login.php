<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $username = '';

    public string $password = '';

    public function render()
    {
        return view('livewire.auth.login')->extends('components.layouts.app');
    }

    public function store()
    {

        if ( ! Auth::attempt(['username'=> $this->username, 'password' => $this->password]) ){
            $this->addError('username', 'Wrong username or password');
            return;
        }

        $this->redirectRoute('home');
    }
}
