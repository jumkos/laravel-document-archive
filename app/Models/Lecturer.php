<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'employee_number'];
    public function examinerDecrees()
    {
        return $this->belongsToMany(ExaminerDecree::class, 'examiner_decree_lecturer', 'lecturer_id', 'examiner_decree_id');
    }

    public function supervisorDecrees()
    {
        return $this->belongsToMany(SupervisorDecree::class, 'supervisor_decree_lecturer', 'lecturer_id', 'supervisor_decree_id');
    }
}
