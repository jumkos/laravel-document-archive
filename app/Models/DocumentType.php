<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
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
