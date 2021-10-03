<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = ['id'];

    public function sets(){
        return $this->hasMany("App\Models\Set");
    }
}