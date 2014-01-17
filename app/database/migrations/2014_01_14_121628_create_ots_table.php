<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;
class CreateOtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$dt = Carbon::now('EAT')->setTime(11, 00, 00)->timestamp;
		Schema::create('ots', function(Blueprint $table) {
			$table->increments('id');
			$table->string('beod');
			$table->integer('eod');
			$table->integer('aeod');
			$table->timestamp('starttime');
			$table->timestamp('endtime');
			$table->timestamps();
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ots');
	}

}
