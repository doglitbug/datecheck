<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add a few default items for testing

        $faker = Faker\Factory::create('en_US');
        foreach (range(1, 200) as $index){
            DB::table('items')->insert([
                'name' => $faker->Company,
                'barcode' => $faker->ean13,
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);
        };

        //Not using a faker class, so that we have real items and barcodes for later testing
        DB::table('items')->insert([
        	[
        	'name' => 'Illicit Soft Drink Orange',
        	'barcode' => '9415359122289',
            'category_id' => Category::where('name','=','Drinks')->first()->id,
        ],
        [
        	'name' => 'HB Peanut Butter 1kg',
        	'barcode' => '9414742037995',
            'category_id' => Category::where('name','=','Breakfast')->first()->id,
        ],
        [
            'name' => 'Cadbury Moro Special Edition',
            'barcode' => '9300617058236',
            'category_id' => Category::where('name','=','Snacks')->first()->id,
        ]
        ]);
    }
}
