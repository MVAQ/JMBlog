<?php

namespace JMApp;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function mspost(){
        return $this->belongsTo('JMApp\Mspost','msposts_id');
    }
    public function user(){
        return $this->belongsTo('JMApp\User');
    }
}
