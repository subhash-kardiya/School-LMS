<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear the sections table before seeding
        DB::table('sections')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('sections')->insert([
    [
        'name' => 'A',
        'class_id' => 1,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'B',
        'class_id' => 1,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'C',
        'class_id' => 1,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }
}
