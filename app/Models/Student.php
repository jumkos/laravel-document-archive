<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_number', 'name', 'study_program_id'];

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
