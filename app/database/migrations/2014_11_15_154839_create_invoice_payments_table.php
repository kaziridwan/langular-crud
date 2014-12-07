<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_payments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->date('payment_date');
            $table->string('payment_method');
            $table->double('amount');
			$table->timestamps();
            $table->foreign('invoice_id')->references('id')->on("invoices");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice_payments');
	}

}
