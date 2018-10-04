<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //Each Item has a Category it belongs to
    public function Category()
    {
    	return $this->belongsTo('App\Category');
    }

    //Item can have many Expiry dates
    public function Expiry(){
    	return $this->hasMany('App\Expiry');
    }
}
