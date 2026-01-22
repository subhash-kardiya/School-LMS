<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $fillable = [
        'admin_name',
        'username',
        'email',
        'password',
        'mobile_no',
        'profile_image',
        'role_id',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
