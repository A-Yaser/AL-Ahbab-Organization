<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function centers()
    {
        return $this->belongsToMany(Center::class);
    }

    public function institutes()
    {
        return $this->hasMany(Institute::class);
    }
}
