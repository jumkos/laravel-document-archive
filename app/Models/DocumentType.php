<?php

namespace App\Models;

use App\Casts\HashId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $casts = [
        'id' => HashId::class
    ];

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
