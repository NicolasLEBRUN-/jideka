<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    public function oeuvres()
    {
        return $this->hasMany('App\Oeuvre');
    }
}
