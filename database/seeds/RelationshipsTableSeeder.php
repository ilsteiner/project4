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
    		'is a parent of',
    		'is a sibling of',
    		'is a mentor of',
    		'is friends with',
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

    //This uses the same lorem ipsum generator I used in project 3
    //I tried to pull this out so it wasn't repeated in both seeders, but couldn't find a good way
    private static function getDescription($length='short') {
        switch ($length) {
            case 'short':
                $descriptors = file(resource_path() . "/descriptors.txt");
                $descriptor = $descriptors[array_rand($descriptors)];
                $description = "This person is " . (mt_rand(0,1) ? 'very ' : '') . $descriptor;
                return str_replace(array("\n\r", "\n", "\r"), "", $description);
            case 'long':
                $loremGen = new \Badcow\LoremIpsum\Generator();
                return $loremGen->getParagraphs(1)[0];
            default:
                return '';
        }
    }
}
