<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'admin_name'    => 'Super Admin',
            'username'      => 'superadmin',
            'email'         => 'superadmin@gmail.com',
            'password'      => Hash::make('superadmin'), // 🔐 bcrypt hash
            'mobile_no'     => '9999999999',
            'profile_image' => null, // or 'admin.png'
            'role_id'       => 1,
            'status'        => 1, // 1 = active, 0 = inactive
        ]);
    }
}
