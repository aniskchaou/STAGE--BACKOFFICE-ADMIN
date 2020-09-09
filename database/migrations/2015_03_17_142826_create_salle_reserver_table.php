<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalleReserverTable extends Migration {

	public function up()
	{
		Schema::create('salle_reserver', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('salle_id')->unsigned();
			$table->string('date_debut',10);
			$table->string('date_fin',10);
		});
	}

	public function down()
	{
		Schema::drop('salle_reserver');
	}
}