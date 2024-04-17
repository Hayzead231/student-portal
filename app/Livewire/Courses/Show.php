<?php

namespace App\Livewire\Courses;

use App\Service\FinanceService;
use App\Models\Course;
use Livewire\Component;

class Show extends Component
{
    public bool $isEnroled = true;

    public ?string $errorMessage = null;

    public Course $course;

    public function mount(string $uuid)
    {
        $this->course = Course::query()->where('uuid', $uuid)->firstOrFail();

        $this->isEnroled = $this->course->isUserEnrolled();
    }

    public function render()
    {
        return view('livewire.courses.show')->extends('components.layouts.app');
    }

    public function enrol()
    {
        $user = auth()->user();

        $callService = FinanceService::createInvoice($user->student_id, $this->course->fee);

    
        if ( $callService['status'] != 'success' ){
            $this->addError('errorMessage', 'Could not enrol course, try again.');
            return;
        }


        $this->course->studentCourses()->create([
            'user_id' => $user->id,
            'invoice_id' => $callService['reference'],
        ]);

        $this->redirectRoute('course.show', $this->course->uuid);
    }

    public function coursePayment()
    {}

    public function formatCurrency($amount)
    {
        return '£'.number_format($amount);
    }
}
