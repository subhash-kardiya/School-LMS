<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\ParentModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear the admins table before seeding
        Admin::truncate();

        // Clear the teachers table before seeding
        Teacher::truncate();

        // Clear the parents table before seeding
        ParentModel::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Super Admin
        Admin::create([
            'admin_name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'mobile_no' => '9999999999',
            'profile_image' => null,
            'role_id' => 1,
            'status' => 1
        ]);

        // Teacher
        Teacher::create([
            'role_id' => 3,
            'name' => 'Demo Teacher',
            'username' => 'teacher01',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('Teacher@123'),
            'mobile_no' => '9876543211',
            'gender' => 'female',
            'date_of_birth' => '1992-05-10',
            'address' => 'Ring Road',
            'city' => 'Surat',
            'state' => 'Gujarat',
            'pincode' => '395007',
            'qualification' => 'B.Ed, M.Sc',
            'exp' => 7,
            'join_date' => now(),
            'profile_image' => 'default_teacher.png',
            'status' => 1
        ]);

        // Parent
        ParentModel::create([
            'role_id' => 5,
            'parent_name' => 'Demo Parent',
            'username' => 'parent01',
            'email' => 'parent@gmail.com',
            'password' => Hash::make('Parent@123'),
            'mobile_no' => '9876543213',
            'gender' => 'male',
            'date_of_birth' => '1980-01-01',
            'address' => 'Main Street',
            'city' => 'Ahmedabad',
            'state' => 'Gujarat',
            'pincode' => '380001',
            'profile_image' => 'default_parent.png',
            'status' => 1
        ]);
    }
}
