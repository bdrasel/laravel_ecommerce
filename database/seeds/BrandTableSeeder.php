<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	Brand::truncate();
    	
        Brand::insert([

            [
        		'name' => 'Samsung',
        	    'slug' => 'samsung'
            ],

            [
        		'name' => 'Apple',
        	    'slug' => 'apple'
            ],

            [
        		'name' => 'Walton',
        	    'slug' => 'walton'
            ],

            [
        		'name' => 'Nokia',
        	    'slug' => 'nokia'
            ],

            [
        		'name' => 'Easy',
        	    'slug' => 'easy'
            ],

            [
        		'name' => 'Colors',
        	    'slug' => 'colors'
            ],

            [
        		'name' => 'Appex',
        	    'slug' => 'appex'
            ]

        ]);
    }
}
