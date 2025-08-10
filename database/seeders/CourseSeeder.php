<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'course1',
            'description' => 'course description 1',
            'field' => 'field 1',
            'teacher' => 'teacher 1',
            'start' => '2019-01-10'
            ]);
        Course::create([
            'title' => 'course2',
            'description' => 'course description 2',
            'field' => 'field 2',
            'teacher' => 'teacher 2',
            'start' => '2025-01-10'
            ]);
    }
}
