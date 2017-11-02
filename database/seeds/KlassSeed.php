<?php

use Illuminate\Database\Seeder;

class KlassSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("klasses")->insert([

        	[	
        		"name"=>"JSS1A",
        	]

        ]);
    }
}
