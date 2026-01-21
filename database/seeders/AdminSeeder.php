<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'admin_name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin123'), // ✅ bcrypt hash
            'mobile_no' => '9999999999',
            'role_id' => 1,
        ]);
    }
}
