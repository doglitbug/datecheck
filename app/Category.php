<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Each Category can have many items attached to it
    public function items()
    {
    	return $this->hasMany('App\Item');
    }
}
