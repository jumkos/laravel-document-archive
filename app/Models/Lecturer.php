<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function examinerDecrees()
    {
        return $this->belongsToMany(ExaminerDecree::class, 'examiner_decree_lecturer', 'lecturer_id', 'examiner_decree_id');
    }

    public function supervisorDecrees()
    {
        return $this->belongsToMany(SupervisorDecree::class, 'supervisor_decree_lecturer', 'lecturer_id', 'supervisor_decree_id');
    }
}
