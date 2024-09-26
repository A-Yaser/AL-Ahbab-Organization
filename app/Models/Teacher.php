<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'person_id', 'institute_id'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }
}
