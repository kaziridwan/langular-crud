<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJournalTransactionItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('journal_transaction_items', function(Blueprint $table)
		{
			//'description','account_id','journal_transaction_id','credit','debit'
			$table->increments('id');
			$table->string('description');
			$table->integer('account_id')->unsigned();
			$table->integer('journal_transaction_id')->unsigned();
			$table->integer('credit');
			$table->integer('debit');
			$table->timestamps();

			$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
			$table->foreign('journal_transaction_id')->references('id')->on('journal_transactions')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('journal_transaction_items');
	}

}
