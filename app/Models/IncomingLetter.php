<?php

namespace App\Models;

use App\Casts\HashId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomingLetter extends Model
{
    use SoftDeletes;

    protected $fillable = ['letter_number', 'date', 'subject', 'sender'];

    protected $casts = [
        'id' => HashId::class
    ];
}
