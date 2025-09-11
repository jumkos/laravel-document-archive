<?php

namespace App\Models;

use App\Services\HashIdService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyProgram extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = ['deleted_at'];

    public function toArray()
    {
        $array = parent::toArray();
        $hashService = new HashIdService();


        // replace id dengan versi hash
        $array['id'] = $hashService->encode($this->attributes['id']);

        return $array;
    }

}
