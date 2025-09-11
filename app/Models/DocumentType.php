<?php

namespace App\Models;

use App\Services\HashIdService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
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

    public function theses()
    {
        return $this->hasMany(Thesis::class, 'document_type_id', 'id');
    }

    public function supervisorDecrees()
    {
        return $this->hasMany(SupervisorDecree::class, 'document_type_id', 'id');
    }

    public function examinerDecrees()
    {
        return $this->hasMany(ExaminerDecree::class, 'document_type_id', 'id');
    }
}
