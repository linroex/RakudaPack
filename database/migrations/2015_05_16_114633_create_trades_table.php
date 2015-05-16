<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("trades", function($table)
		{
			$table->increments('id');
			$table->integer('from')->unsigned();
			$table->foreign('from')->references('id')->on('users');
			$table->integer('to')->unsigned();
			$table->foreign('to')->references('id')->on('users');
			$table->enum('type', ['mission', 'system']);
			$table->integer('type_id');
			$table->integer('amount');
			$table->longText('note');
			$table->timestamps();
			$table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trades');
	}

}
