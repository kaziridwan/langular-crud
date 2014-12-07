<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillingItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('billing_items', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('bill_id')->unsigned();
            $table->integer('raw_material_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->integer('quantity');
            $table->text('description');
            $table->double('unit_price');
            $table->double('vat'); //in %
            $table->timestamps();


            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->foreign('raw_material_id')->references('id')->on('raw_materials')->onDelete('cascade');
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
		Schema::drop('billing_items');
	}

}
