<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubCategoriesTableSeeder extends Seeder {

	public function run()
	{
		$subs = [

            ['account_type_id' => 1,
                'name' => 'Fixed assets',
            ],
            ['account_type_id' => 1,
                'name' => 'Current assets'],
            ['account_type_id' => 2,
                'name' => 'Short term liability'],
            ['account_type_id' => 2,
                'name' => 'Long term liability'],
            ['account_type_id' => 4,
                'name' => 'Cost of Goods Sold'],
            ['account_type_id' => 4,
                'name' => 'Operating Expenses'],
            ['account_type_id' => 4,
                'name' => 'Financial Expenses'],


        ];

        foreach($subs as $sub)
        {
            SubCategory::create($sub);
        }
	}

}