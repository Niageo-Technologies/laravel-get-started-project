<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    protected $guarded = ['id'];

    public function point(){
        return $this->belongsTo('App\Models\Point');
    }
}
