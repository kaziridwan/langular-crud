<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BillPaymentsTableSeeder extends Seeder {


	public function run()
	{
        $payments = [
            [
                'bill_id' => 1,
                'payment_date' => '2014-09-11',
                'account_id'    => '1',
                'amount' => 10,
                'payment_method' => 'bkash',
                'memo' => 'amazing stuff man'
            ],
            [
                'bill_id' => 1,
                'payment_date' => '2014-11-11',
                'account_id'    => '1',
                'amount' => 50,
                'payment_method' => 'paypal',
                'memo' => 'amazing stuff man'
            ],
            [
                'bill_id' => 2,
                'payment_date' => '2014-12-11',
                'account_id'    => '1',
                'amount' => 60,
                'payment_method' => 'bkash',
                'memo' => 'amazing stuff man'
            ],
            [
                'bill_id' => 2,
                'payment_date' => '2014-12-11',
                'account_id'    => '2',
                'amount' => 150,
                'payment_method' => 'paypal',
                'memo' => 'amazing stuff man'
            ],

        ];

        foreach ($payments as $payment) {
            BillPayment::create($payment);
        }

    }

}