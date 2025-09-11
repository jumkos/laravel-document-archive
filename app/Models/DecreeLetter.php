<?php

namespace App\Models;

use App\Casts\HashId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DecreeLetter extends Model
{
    use SoftDeletes;
    protected $fillable = ['letter_number', 'date', 'subject'];

    protected $casts = [
        'id' => HashId::class
    ];
}
