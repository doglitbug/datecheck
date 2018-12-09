<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //Each Item has a Category it belongs to
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    //Item can have many Expiry dates
    public function expiry(){
    	return $this->hasMany('App\Expiry')->orderBy('expiry_date');
    }

    //The attributes that are mass assignable
    protected $fillable = ['name', 'barcode', 'category_id'];

    //Remove timestamps as we aren't not using them
    public $timestamps = false;
}