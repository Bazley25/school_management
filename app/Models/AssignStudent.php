<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;

    public function student_info()
    {
        return $this->belongsTo(User::class, 'student_id','id');
    }
    public function student_discount()
    {
        return $this->belongsTo(DiscountStudent::class, 'id','assign_student_id');
    }

    public function student_class_info()
    {
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }
    
    public function student_year_info()
    {
        return $this->belongsTo(StudentYear::class, 'year_id','id');
    }
}
