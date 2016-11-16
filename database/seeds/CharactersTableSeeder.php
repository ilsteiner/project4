<?php

use Illuminate\Database\Seeder;

use Badcow\LoremIpsum;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 50; $i++) {
    		$malePrefixes = array(
    			'Mr.',
    			'Dr.'
    			);
    		$femalePrefixes = array(
    			'Ms.',
    			'Mrs.',
    			'Dr.'
    			);
    		$suffixes = array(
    			'Jr.',
    			'I',
    			'II',
    			'III',
    			'IV',
    			'Esq.',
    			'Sr.'
    			);
    		$types =
    		$sex = (mt_rand(0,1) ? 'male' : 'female');
    		$first_name = self::getFirstName($sex);
    		$prefix = (mt_rand(0,10) > 7 ? 
		    			($sex == 'male' ? 
		    				$malePrefixes[array_rand($malePrefixes)] : 
		    				$femalePrefixes[array_rand($femalePrefixes)]) 
		    			: null);
    		$middle_name = (mt_rand(0,10) > 7 ? self::getFirstName('both') : null);
    		$last_name = self::getLastName($sex);
    		$suffix = (mt_rand(0,10) > 7 ? $suffixes[array_rand($suffixes)] : null);
    		$short_description = self::getDescription('short');
    		$long_description = self::getDescription('long');

    		DB::table('characters')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

        	'prefix' => $prefix,
        	'first_name' => $first_name,
        	'middle_name' => $middle_name,
        	'last_name' => $last_name,
        	'suffix' => $suffix,
        	'short_description' => $short_description,
        	'long_description' => $long_description,
        	'sex' => ($sex == 'male' ? 
        				DB::table('sexes')->where('sex','male')->first()->id : 
        				DB::table('sexes')->where('sex','female')->first()->id)
        	]);
    	}
    }

    //This is borrowed from my project 3, but modified a little
    private static function getLastName() {
    	//Get a random last name
    	$lastNames = file(resource_path() . "/names/lastNames.txt");
    	$lastName = $lastNames[array_rand($lastNames)];

    	return str_replace(array("\n\r", "\n", "\r"), "", $lastName);   	
    }

    private static function getFirstName($sex='both') {
    	$firstNames;
    	switch ($sex) {
    		case 'male':
    			$firstNames = file(resource_path() . "/names/maleNames.txt");
    			break;
    		case 'female':
    			$firstNames = file(resource_path() . "/names/femaleNames.txt");
    			break;
    		case 'both':
    			$firstNames = array_merge(
    				file(resource_path() . "/names/maleNames.txt"),
    				file(resource_path() . "/names/femaleNames.txt")
    				);
    			break;
    		default:
    			$firstNames = array_merge(
    				file(resource_path() . "/names/maleNames.txt"),
    				file(resource_path() . "/names/femaleNames.txt")
    				);
    			break;
    	}

    	//Get random name from the selected array
    	return str_replace(array("\n\r", "\n", "\r"), "", $firstNames[array_rand($firstNames)]);
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
