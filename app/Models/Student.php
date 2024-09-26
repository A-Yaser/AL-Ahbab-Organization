<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $fillable = ['person_id', 'group_id', 'subject_id'];
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
