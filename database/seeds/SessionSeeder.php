<?php

use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sessions")->insert([

        	[	
                "name"=>"2015/2016",
                "current"=>1,
        	]

        ]);
    }
}
