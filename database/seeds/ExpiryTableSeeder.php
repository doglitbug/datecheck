<?php

use Illuminate\Database\Seeder;
use App\Expiry;
use Carbon\Carbon;

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
            //Add random number(1-4) of dates to each item
            for($i=1;$i<rand(1,4);$i++){
                //Choose a date between a 10 days ago and 3 weeks in future
                $randomDate = Carbon::now()->addDays(rand(-10, 21))->format('Y-m-d');

            	$item->expiry()->create(['expiry_date'=>$randomDate]);
            }
        }
    }
}
