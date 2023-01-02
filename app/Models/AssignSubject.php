<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'subject_id',
        'full_mark',
        'pass_mark',
        'subjective_mark',
    ];


    public function classtosubject()
    {
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }

    public function subject_to_assignsubject()
    {
        return $this->belongsTo(Subject::class, 'subject_id','id');
    }
}
