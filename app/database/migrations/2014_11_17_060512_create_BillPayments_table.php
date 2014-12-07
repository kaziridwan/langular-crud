<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bill_payments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('bill_id')->unsigned();
            $table->date('payment_date');
            $table->integer('account_id')->unsigned();
            $table->double('amount');
            $table->string('payment_method');
            $table->string('memo');
			$table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bill_payments');
	}

}
