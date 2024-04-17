<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $courses = Course::allUserEnrolledCourses()->map(function($course){
            $course['invoice_id'] = $course->studentCourse()->invoice_id;
            return $course;
        });

        return view('livewire.dashboard', [
            'courses' => $courses,
        ])->extends('components.layouts.app');
    }
}
