<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'type', 'contract_file'];

    public function institutes()
    {
        return $this->belongsToMany(Institute::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
