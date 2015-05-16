<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("missions", function($table){
			$table->increments('id');
			$table->string('name', 200);
			$table->integer('creator')->unsigned();
			$table->foreign('creator')->references('id')->on('users');
			$table->integer('receiver')->unsigned();
			$table->foreign('receiver')->references('id')->on('users');
			$table->dateTime('appointime');
			$table->string('coordinate', 100);
			$table->string('location', 100);
			$table->integer('point');
			$table->integer('period');
			$table->enum('status', ['unreceived', 'received', 'finish', 'cancel']);
			$table->longText('note');
			$table->timestamp('expiretime');
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
		Schema::drop('missions');
	}

}
