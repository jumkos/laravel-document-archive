<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DecreeLetter extends Model
{
    use SoftDeletes;
    protected $fillable = ['letter_number', 'date', 'subject'];
}
