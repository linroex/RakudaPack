<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fix1 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("trades", function($table){
			$table->longText('note')->nullable()->change();
			//$table->renameColumn('type_id', 'relate_id');
			$table->integer('type_id')->unsigned()->change();
			$table->foreign('type_id')->references('id')->on('missions')->change();
		});
		Schema::table("missions", function($table){
			$table->longText('note')->nullable()->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('trades');
		//Schema::drop('missions');
		Schema::table('missions' ,function($table){
			
		});
		Schema::table('trades', function($table){
			$table->dropForeign('trades_type_id_foreign');
			//$table->renameColumn('relate_id', 'type_id');
		});
	}

}
