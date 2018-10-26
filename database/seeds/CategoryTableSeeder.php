<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        //Add a view default categories for testing
        //Not using a faker class, so that we have real items and barcodes for later testing
    	DB::table('categories')->insert([
    		[
    			'name' => 'Drinks',
    		],
    		[
    			'name' => 'Snacks',
    		],
    		[
    			'name' => 'Breakfast',
    		]
    	]);
    }
}
