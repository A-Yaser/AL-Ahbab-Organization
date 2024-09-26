<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'name',
        'username',
        'birth_day',
        'phone',
        'sex',
        'address',
        'IsMarried',
        'Status',
        'profile_picture'
    ];


    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function tester()
    {
        return $this->hasOne(Tester::class);
    }
    public function manager()
    {
        return $this->hasOne(Manager::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatar()
    {
        if ($this->profile_picture) {
            return "images/$this->profile_picture";
        }
        return "images/avatar.png";
    }
}
