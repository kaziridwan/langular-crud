<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class InvoiceItemsTableSeeder extends Seeder {

	public function run()
	{

		$invoices = [
			[
				'invoice_id' => 1,
				'product_id' => 1,
				'quantity' => 3,
				'description' => "yammmi",
				'unit_price' => 220,
                'vat' => 10,
			],
			[
				'invoice_id' => 1,
				'product_id' => 2,
				'quantity' => 1,
				'description' => "yammmi",
				'unit_price' => 520,
                'vat' => 10,
			],

			[
				'invoice_id' => 2,
				'product_id' => 1,
				'quantity' => 1,
				'description' => "yammmi",
				'unit_price' => 260,
                'vat' => 10,
			],

			[
				'invoice_id' => 3,
				'product_id' => 1,
				'quantity' => 4,
				'description' => "yammmi",
				'unit_price' => 210,
                'vat' => 10,
			],
			[
				'invoice_id' => 3,
				'product_id' => 2,
				'quantity' => 5,
				'description' => "yammmi",
				'unit_price' => 500,
                'vat' => 10,
			],
		];

		foreach ($invoices as $invoice) {
			InvoiceItem::create($invoice);
		}
	}

}