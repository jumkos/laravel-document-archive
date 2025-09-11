<?php

namespace App\Models;

use App\Services\HashIdService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_number', 'name', 'study_program_id'];
    protected $hidden = ['deleted_at'];

    public function toArray()
    {
        $array = parent::toArray();
        $hashService = new HashIdService();

        // replace id dengan versi hash
        $array['id'] = $hashService->encode($this->attributes['id']);
        $array['study_program_id'] = $hashService->encode($this->attributes['study_program_id']);

        return $array;
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id', 'id');
    }


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
