<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $guarded=[''];
    public function Rendez()
    {
        return $this->hasMany('App\Rendez');
    }



    //
}
