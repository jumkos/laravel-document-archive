<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminerDecree extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'letter_number', 'date', 'student_id', 'document_type_id', 'title', 'year'
    ];

    protected $casts = [
        'id' => HashId::class
    ];

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
