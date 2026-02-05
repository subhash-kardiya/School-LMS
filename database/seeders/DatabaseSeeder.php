<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call all seeders in proper order
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            AcademicYearSeeder::class,
            AdminSeeder::class,
            ClassSeeder::class,
            SectionSeeder::class,
            StudentSeeder::class,
            subjectSeeder::class,
        ]);
    }
}
