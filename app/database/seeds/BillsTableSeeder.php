<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BillsTableSeeder extends Seeder {

	public function run()
	{

        $bills = [
            [
                'date' => '2014-11-08',
                'due_date' => '2014-12-19',
                'memo'	=> 'test memo',
                'vendor_id' => 1,
                'approved' => false,
                'bill_number' => '224455'
            ],
            [
                'date' => '2014-11-09',
                'due_date' => '2015-12-19',
                'memo'	=> 'test memo',
                'vendor_id' => 2,
                'approved' => false,
                'bill_number' => '124455'
            ],
            [
                'date' => '2014-11-19',
                'due_date' => '2015-2-1',
                'memo'	=> 'test memo',
                'vendor_id' => 2,
                'approved' => false,
                'bill_number' => '524455'
            ],
        ];

        foreach($bills as $bill) {
            Bill::create($bill);
        }


	}

}