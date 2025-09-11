<?php

namespace App\Models;

use App\Casts\HashId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyProgram extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $casts = [
        'id' => HashId::class
    ];
}
