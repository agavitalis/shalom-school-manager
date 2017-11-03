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
                "words"=> "1st Term",
            ],
            [	
                "name"=>2,
                "current"=>0,
                "words"=> "2nd Term",
            ],
            [	
                "name"=>3,
                "current"=>0,
                "words"=> "3rd Term",
            ],



        ]);
    }
}
