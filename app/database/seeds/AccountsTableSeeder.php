<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccountsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Account::create([
                'account_type_id' => rand(1,5),
                'sub_category_id' => 0,
                'description' => $faker->paragraph(1),
                'name'=>$faker->firstName,
            ]);
		}
	}

}