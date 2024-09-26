<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tester extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function institutes()
    {
        return $this->belongsToMany(Institute::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
