<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{

		$products = [
			[
				'account_id' => 1,
				'name' => 'Cheese cake',
				'price' => 220,
				'description' => "Tastes great",
			],
			[
				'account_id' => 1,
				'name' => 'Cheese Brownee',
				'price' => 520,
				'description' => "Tastes amazing",
			],
		];

		foreach ($products as $product) {
			Product::create($product);
		}

	}

}