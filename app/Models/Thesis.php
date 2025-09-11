<?php

namespace App\Models;

use App\Casts\HashId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thesis extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_id', 'document_type_id', 'year', 'title'];

    protected $casts = [
        'id' => HashId::class
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id', 'id');
    }
}
