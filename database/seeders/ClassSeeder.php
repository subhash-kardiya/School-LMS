<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear the classes table before seeding
        DB::table('classes')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('classes')->insert([
            [
                'id' => 1,
                'name' => 'Class 1',
                'academic_year_id' => 1, // must exist in academic_years
                'class_teacher_id' => 1, // must exist in teachers
                'status' => 1, // active
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
