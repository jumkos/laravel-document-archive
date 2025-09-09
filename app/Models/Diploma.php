<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diploma extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_id', 'year', 'diploma_number'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
