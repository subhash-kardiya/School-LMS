<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Classes;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $class = Classes::first();
        if (!$class) {
            return;
        }

        Subject::updateOrCreate(
            ['name' => 'Gujarati', 'class_id' => $class->id],
            ['subject_code' => 'GUJ', 'status' => 1]
        );

        Subject::updateOrCreate(
            ['name' => 'Hindi', 'class_id' => $class->id],
            ['subject_code' => 'HIN', 'status' => 1]
        );
    }
}
