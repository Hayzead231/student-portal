<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentCourses(): HasMany
    {
        return $this->hasMany(StudentCourse::class, 'course_id', 'id');
    }

    public function studentCourse()
    {
        return $this->studentCourses->where('user_id', auth()->id())->first();
    }

    public function isUserEnrolled(): bool
    {
        return (bool) $this->studentCourses->where('user_id', auth()->id())->first();
    }

    public static function allUserEnrolledCourses()
    {
        return self::all()->filter(function($course){
            return $course->isUserEnrolled();
        });
    }
}
