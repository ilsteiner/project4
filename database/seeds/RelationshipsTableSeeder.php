<?php

use Illuminate\Database\Seeder;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$characters = DB::table('characters')->select('id')->get();

    	$relationships = array(
    		'parent',
    		'sibling',
    		'mentor',
    		'friend',
    		'is afraid of',
    		'loathes',
    		'admirers'
    		);

        foreach ($characters as $character) {
        	if(mt_rand(0,1)){
        		DB::table('relationships')->insert([
	        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

	        	'name' => $relationships[array_rand($relationships)],
	        	'character' => $character->id,
	        	'is_related_to' => DB::table('characters')->inRandomOrder()->first()->id
	        	]);
        	}
        }
    }
}
