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
}
