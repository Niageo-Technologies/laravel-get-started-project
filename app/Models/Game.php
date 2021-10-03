<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = ['id'];

    public function set(){
        return $this->belongsTo("App\Models\Set", 'set_id');
    }

    public function points(){
        return $this->hasMany("App\Models\Point");
    }
}
