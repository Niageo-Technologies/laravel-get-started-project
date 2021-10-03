<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $guarded = ['id'];

    public function player(){
        return $this->belongsTo("App\Models\Player", 'opponent_id');
    }

    public function games(){
        return $this->hasMany("App\Models\Game");
    }
}
