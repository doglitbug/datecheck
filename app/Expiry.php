<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expiry extends Model
{
    //Get the item that this Expiry belongs to
    public function item(){
    	return $this->belongsTo('App\Item');
    }

    //The attributes that are mass assignable
    protected $fillable = ['expiry_date', 'item_id'];

    //Assign table name so we aren't looking for 'expiries' (not to be confused with expires)
    protected $table = "expiry";

    //Remove timestamps as we aren't not using them
    public $timestamps = false;
}