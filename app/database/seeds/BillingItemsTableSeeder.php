<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BillingItemsTableSeeder extends Seeder {

	public function run()
	{


        $billing_items = [
            [
                'bill_id' => 1,
                'account_id' => 1,
                'raw_material_id' => 1,
                'description' => 'awesome product',
                'quantity' => 3,
                'unit_price' => 226,
                'vat' => 10
            ],

            [
                'bill_id' => 1,
                'account_id' => 1,
                'raw_material_id' => 2,
                'description' => 'amazing product ',
                'quantity' => 2,
                'unit_price' => 200,
                'vat' => 5
            ],
        ];

        foreach($billing_items as $billing_item) {
            BillingItem::create($billing_item);
        }

	}

}