<?php

namespace JMApp;

use Illuminate\Database\Eloquent\Model;

class Mspost extends Model
{
    //
    public function user(){

        return $this->belongsTo('JMApp\User');

    }
    public function categorie(){

        return $this->belongsTo('JMApp\Categorie','category_id');

    }
    public function comments(){

        return $this->hasMany('JMApp\Comment','msposts_id');

    }
}
