<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherMapping extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'section_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
