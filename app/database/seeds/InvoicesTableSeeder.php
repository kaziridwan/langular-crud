<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class InvoicesTableSeeder extends Seeder {

	public function run()
	{

		$invoices = [
			[
				'date' => '2014-11-08',
				'due_date' => '2014-12-19',
				'memo'	=> 'test memo',
				'draft' => true,
				'customer_id' => 1,
				'approved' => false,
				'sent' => false,
				'amount_paid' => 0.0
			],
			[
				'date' => '2014-11-11',
				'due_date' => '2014-12-9',
				'memo'	=> 'test memo 2',
				'draft' => true,
				'customer_id' => 2,
				'approved' => false,
				'sent' => true,
				'amount_paid' => 0.0
			],
			[
				'date' => '2014-11-15',
				'due_date' => '2015-1-19',
				'memo'	=> 'test memo3',
				'draft' => true,
				'customer_id' => 1,
				'approved' => true,
				'sent' => true,
				'amount_paid' => 20.0
			],
		];

		foreach ($invoices as $invoice) {
			Invoice::create($invoice);
		}



	}

}