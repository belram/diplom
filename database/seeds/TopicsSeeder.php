<?php

use Illuminate\Database\Seeder;


class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table("topics")->insert(
    		[

				[
				    "topic" => "Basics",
				    "alias" => "basics"
				],

				[
				    "topic" => "Mobile",
				    "alias" => "mobile"
				],

				[
				    "topic" => "Account",
				    "alias" => "account"
				],

				[
				    "topic" => "Payments",
				    "alias" => "payments"
				],

				[
				    "topic" => "Privacy",
				    "alias" => "privacy"
				],

				[
				    "topic" => "Delivery",
				    "alias" => "delivery"
				]

    		]
    	);

    }
}
