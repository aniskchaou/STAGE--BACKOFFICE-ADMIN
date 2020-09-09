<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticiperTable extends Migration {

	public function up()
	{
		Schema::create('participer', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('soutenance_id')->unsigned();
			$table->integer('enseig_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('participer');
	}
}