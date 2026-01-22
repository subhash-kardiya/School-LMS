<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'        => 'Super Admin',
                'description' => 'Highest level admin with all permissions',
            ],
            [
                'name'        => 'Admin',
                'description' => 'System Administrator',
            ],
            [
                'name'        => 'Teacher',
                'description' => 'School Teacher',
            ],
            [
                'name'        => 'Student',
                'description' => 'School Student',
            ],
            [
                'name'        => 'Parent',
                'description' => 'Student Parent',
            ],
        ]);
    }
}
