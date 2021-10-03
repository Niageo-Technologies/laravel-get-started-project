<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = ['id'];


    public function balls(){
        return $this->hasMany("App\Models\Ball");
    }

    public function game(){
        return $this->belongsTo("App\Models\Game");
    }


}
