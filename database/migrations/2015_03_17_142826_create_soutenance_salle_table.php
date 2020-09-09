<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoutenanceSalleTable extends Migration {

	public function up()
	{
		Schema::create('soutenance_salle', function(Blueprint $table) {
			$table->increments('id');
			$table->string('salle_nom', 100)->unique();
			$table->integer('salle_nb_plase')->nullable();
			$table->boolean('salle_status')->nullable()->default(true);
		});
	}

	public function down()
	{
		Schema::drop('soutenance_salle');
	}
}