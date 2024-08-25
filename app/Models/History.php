<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function staff()
    {
        return $this->hasMany(Staff::class,'history_id','id');
    }
}
