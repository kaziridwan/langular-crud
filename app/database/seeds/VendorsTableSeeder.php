<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VendorsTableSeeder extends Seeder {

	public function run()
	{
        $vendors = [
            [
                'name' => 'Arong',
                'email'	=> 'arong@gmail.com',
                'first_name' => "Noil",
                "last_name"	=> "Mahmud",
                "account_no" => '22AACC3232',
                'address' => "Dhanmondi housing Limited, Dhaka 7000"
            ],
            [
                'name' => 'Fury butter house',
                'email'	=> 'butterpunk@gmail.com',
                'first_name' => "Blue",
                "last_name"	=> "butter",
                "account_no" => '33CCDD223232',
                'address' => "Basher kella road, Progoti sharani, Dhaka "
            ]
        ];

        foreach ($vendors as $c) {
            Vendor::create($c);
        }
	}

}