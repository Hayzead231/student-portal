<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public string $firstName = '';

    public string $surname = '';

    public function mount()
    {
        $user = auth()->user();

        $this->firstName = $user->first_name;

        $this->surname = $user->surname;
    }

    public function render()
    {
        return view('livewire.profile', [
            'user' => auth()->user(),
        ])->extends('components.layouts.app');
    }

    public function store()
    {
        $user = auth()->user();

        $user->first_name = $this->firstName;

        $user->surname = $this->surname;

        $user->save();

        $this->redirectRoute('profile');
    }
}
