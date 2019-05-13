<?php

namespace JMApp;

use Illuminate\Database\Eloquent\Model;

class Portpholio extends Model
{
    //
    public function filter(){
        return $this->belongsTo('JMApp\Pfilter', 'filter_alias', 'alias');//
    }
}
