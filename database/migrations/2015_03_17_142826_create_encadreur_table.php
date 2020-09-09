<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEncadreurTable extends Migration {

	public function up()
	{
		Schema::create('encadreur', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('stage_id')->unsigned();
			$table->integer('enseig_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('encadreur');
	}
}