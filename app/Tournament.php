<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //

    public function esport()
    {
        return $this->belongsTo('App\Esport','title','id');
    }
}
