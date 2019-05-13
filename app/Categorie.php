<?php

namespace JMApp;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    public function mspost(){
        return $this->hasMany('JMApp\Mspost');
    }
}
