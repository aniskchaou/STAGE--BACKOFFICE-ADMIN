<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelechargerTable extends Migration {

	public function up()
	{
		Schema::create('telecharger', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('tele_nom', 255);
			$table->string('tele_ficher', 255);
		});
	}

	public function down()
	{
		Schema::drop('telecharger');
	}
}