<?php

namespace App\Models;

use App\Services\HashIdService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diploma extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_id', 'year', 'diploma_number'];
    protected $hidden = ['deleted_at'];

    public function toArray()
    {
        $array = parent::toArray();
        $hashService = new HashIdService();

        // replace id dengan versi hash
        $array['id'] = $hashService->encode($this->attributes['id']);
        $array['student_id'] = $hashService->encode($this->attributes['student_id']);

        return $array;
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
