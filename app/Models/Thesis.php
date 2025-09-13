<?php

namespace App\Models;

use App\Services\HashIdService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thesis extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_id', 'document_type_id','study_program_id', 'year', 'title'];
    protected $hidden = ['deleted_at'];

    public function toArray()
    {
        $array = parent::toArray();
        $hashService = new HashIdService();


        // replace id dengan versi hash
        $array['id'] = $hashService->encode($this->attributes['id']);
        $array['student_id'] = $hashService->encode($this->attributes['student_id']);
        $array['document_type_id'] = $hashService->encode($this->attributes['document_type_id']);

        return $array;
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id', 'id');
    }

       public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'student_id', 'id');
    }
}
