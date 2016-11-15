<?php

use Illuminate\Database\Seeder;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('sexes')->where('sex','male')->count() == 0){
            DB::table('sexes')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'sex' => 'male',
                'icon' => 'f222'
            ]);
        }
        
        if(DB::table('sexes')->where('sex','female')->count() == 0){
            DB::table('sexes')->insert([
            		'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'sex' => 'female',
                    'icon' => 'f221'
            ]);
        }

        if(DB::table('sexes')->where('sex','any')->count() == 0){
            DB::table('sexes')->insert([
            		'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'sex' => 'any',
                    'icon' => 'f22c'
            ]);
        }

        if(DB::table('sexes')->where('sex','other')->count() == 0){
            DB::table('sexes')->insert([
            		'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'sex' => 'other',
                    'icon' => 'f22c'
            ]);
        }

        if(DB::table('sexes')->where('sex','N/A')->count() == 0){
            DB::table('sexes')->insert([
            		'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            		'sex' => 'N/A',
                    'icon' => 'f22d'
            ]);
        }
    }
}
