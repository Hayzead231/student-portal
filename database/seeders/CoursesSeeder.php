<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Advanced Software Engineering ',
                'description' => 'This module is to provide the student with the necessary skills to be a practising software developer.',
                'fee' => '1300',
            ],
            [
                'title' => 'Cloud Computing Development',
                'description' => 'The module provides an understanding of Cloud Computing technologies and software processes and methods for Cloud Computing',
                'fee' => '1400',
            ],
            [
                'title' => 'Research Practice',
                'description' => 'The Research Practice (RP) module is the foundation for the whole of your Master’s Degree, covering the core skills of research and critical analysis',
                'fee' => '1200',
            ],
            [
                'title' => 'Project Management',
                'description' => 'This module content aims to equip students with an insight into the challenges of managing projects in practice',
                'fee' => '4000',
            ],
            [
                'title' => 'Dissertation',
                'description' => "Learn about the fundamental principles and approaches for Intelligent Systems, autonomous behaviour, sensing and control, through the practical example of a simple robotic device (Delta Robot). You''ll have opportunity to work practically with the robot and develop software for simple behavioural and reaction patterns of robotic devices",
                'fee' => '725',
            ],
            [
                'title' => 'Software Engineering for Service Computing',
                'description' => 'This module provides an in-depth look at the Service-Oriented Architecture paradigm and, more specifically, at its recent development: Microservices.',
                'fee' => '5000',
            ],
        ];

        foreach ($courses as $course){
            $course['uuid'] = Uuid::uuid4();
            Course::query()->create($course);
        }
    }
}
