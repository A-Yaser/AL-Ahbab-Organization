<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'teacher_id', 'institute_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }


    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }
    public function center()
    {
        return $this->belongsTo(Center::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'group_subject');
    }
}
