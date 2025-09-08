<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupervisorDecree extends Model
{
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class, 'supervisor_decree_lecturer', 'supervisor_decree_id', 'lecturer_id');
    }
}
