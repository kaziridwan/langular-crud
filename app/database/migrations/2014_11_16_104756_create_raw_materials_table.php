<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRawMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('raw_materials', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->integer('account_id')->unsigned();
            $table->double('price');
            $table->string('description');
			$table->timestamps();
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
		Schema::drop('raw_materials');
	}

}
