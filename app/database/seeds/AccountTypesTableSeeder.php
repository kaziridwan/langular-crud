<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccountTypesTableSeeder extends Seeder {

	public function run()
	{
		$data=[
              [
                  'name'=>'Assest'
              ],
            [
                'name'=>'Liability/Credit Card'
            ],
            [
                'name'=>'Income'
            ],
            [
                'name'=>'Expense'
            ],
            [
                'name'=>'Equity'
            ],
        ];

        foreach($data as $datam)
        {
            AccountType::create($datam);
        }
	}

}