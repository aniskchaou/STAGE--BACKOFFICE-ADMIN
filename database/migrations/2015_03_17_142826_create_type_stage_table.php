<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeStageTable extends Migration {

	public function up()
	{
		Schema::create('type_stage', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type_nom', 100)->unique();
			$table->smallInteger('type_dur_max');
			$table->smallInteger('type_dur_min');
			$table->boolean('type_encadreur');
			$table->boolean('type_obligatoire');
			$table->boolean('type_soutenable');
			$table->smallInteger('type_nb_max');
			$table->smallInteger('type_nb_min');
		});
	}

	public function down()
	{
		Schema::drop('type_stage');
	}
}