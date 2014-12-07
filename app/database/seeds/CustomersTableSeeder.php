<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{

		$customers = [
			[
				'name' => 'Pixelizard',
				'email'	=> 'pixeli@gmail.com',
				'first_name' => "Anik",
				"last_name"	=> "hasan",
				"account_no" => '22AACC3232',
				'address' => "Mohammadia housing society road 7"
			],
			[
				'name' => 'Soft wind',
				'email'	=> 'softixeli@gmail.com',
				'first_name' => "Moinur",
				"last_name"	=> "Rahman",
				"account_no" => '33CCDD223232',
				'address' => "Bonani 22 , housing road Dhaka "
			]
		];

		foreach ($customers as $c) {
			Customer::create($c);
		}
	}

}