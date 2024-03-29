<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('invoice_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity');
			$table->text('description');
			$table->double('unit_price');
            $table->double('vat'); //in %
			$table->timestamps();


			$table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice_items');
	}

}
