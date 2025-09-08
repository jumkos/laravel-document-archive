<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExaminerDecree extends Model
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
        return $this->belongsToMany(Lecturer::class, 'examiner_decree_lecturer', 'examiner_decree_id', 'lecturer_id');
    }

}
