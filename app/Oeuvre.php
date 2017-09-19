<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model
{
    public function galerie()
    {
        return $this->belongsTo('App\Galerie', 'galerie_id', 'id');
    }
}
