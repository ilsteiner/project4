<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SexesTableSeeder::class);
        $this->call(CharactersTableSeeder::class);
        $this->call(RelationshipsTableSeeder::class);
    }
}
