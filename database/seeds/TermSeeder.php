<?php

use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("terms")->insert([

        	[	
                "name"=>1,
                "current"=>1,
            ],
            [	
                "name"=>2,
                "current"=>0,
            ],
            [	
                "name"=>3,
                "current"=>0,
            ],



        ]);
    }
}
