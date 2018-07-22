<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Add a view default items for testing
        //Not using a faker class, so that we have real items and barcodes for later testing
        DB::table('items')->insert([
        	[
        	'name' => 'Illicit Soft Drink Orange',
        	'barcode' => '9415359122289',
        ],
        [
        	'name' => 'HB Peanut Butter 1kg',
        	'barcode' => '9414742037995',
        ]
        ]);
    }
}
