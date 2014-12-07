<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RawMaterialsTableSeeder extends Seeder {

	public function run()
	{
		$materials = [
            [
                'account_id' =>2,
                'name'  => 'Milk vita',
                'description' => 'condensed milk',
                'price' => 331,
            ],
            [
                'account_id' =>1,
                'name'  => 'butter',
                'description' => 'white',
                'price' => 190,
            ],
            [
                'account_id' =>1,
                'name'  => 'green tea',
                'description' => 'exported from sylhet',
                'price' => 220,
            ]
        ];

        foreach($materials as $mat) {
            RawMaterial::create($mat);
        }

	}

}