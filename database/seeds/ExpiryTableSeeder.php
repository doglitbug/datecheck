<?php

use Illuminate\Database\Seeder;
use App\Expiry;

class ExpiryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Grab all items
        foreach(App\Item::all() as $item){
        	$item->expiry()->create(['expiry_date'=>'2018-12-30']);
        }
    }
}
