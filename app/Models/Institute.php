<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'manager_id', 'tester_id', 'region_id'];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function tester()
    {
        return $this->hasOne(Tester::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function centers()
    {
        return $this->belongsToMany(Center::class, 'center_institute');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
