<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Money\Money;

class Index extends Component
{
    public function render()
    {
        $courses = Course::all();

        return view('livewire.courses.index', [
            'courses' => $courses,
        ])->extends('components.layouts.app');
    }

    public function formatCurrency($amount)
    {
        return '£'.number_format($amount);
    }
}
