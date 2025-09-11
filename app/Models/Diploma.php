<?php

namespace App\Models;

use App\Casts\HashId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diploma extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_id', 'year', 'diploma_number'];

    protected $casts = [
        'id' => HashId::class
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
