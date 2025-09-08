<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function theses()
    {
        return $this->hasMany(Thesis::class, 'student_id', 'id');
    }

    public function diploma()
    {
        return $this->hasOne(Diploma::class, 'student_id', 'id');
    }

    public function examinerDecrees()
    {
        return $this->hasMany(ExaminerDecree::class, 'student_id', 'id');
    }
}
