<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->date('date');
			$table->date('due_date');
			$table->text('memo'); //note
			$table->boolean('draft');
			$table->integer('customer_id')->unsigned();
			$table->boolean('approved');
			$table->boolean('sent');
			$table->double('amount_paid');
			$table->timestamps();
			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}
