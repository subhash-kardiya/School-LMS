<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'role_id' => 4,
            'student_name' => 'Demo Student',
            'username' => 'student01',
            'email' => 'student@gmail.com',
            'password' => Hash::make('Student@123'),
            'mobile_no' => '9876543212',
            'gender' => 'male',
            'date_of_birth' => '2008-06-15',
            'address' => 'School Road',
            'city' => 'Vadodara',
            'state' => 'Gujarat',
            'pincode' => '390001',
            'profile_image' => 'default_student.png',
            'class_id' => 1,
            'section_id' => 1,
            'academic_year_id' => 1,
            'parent_id' => 1,
            'status' => 1
        ]);
    }
}
