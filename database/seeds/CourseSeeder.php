<?php

use Illuminate\Database\Seeder;

use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            'Matematika',
            'Bahasa Indonesia',
            'IPA',
            'IPS',
            'Bahasa Inggris'
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate([
                'name' => $course
            ]);
        }
    }
}
