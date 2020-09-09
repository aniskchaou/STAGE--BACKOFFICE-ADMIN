<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompetenceTable extends Migration {

	public function up()
	{
		Schema::create('competence', function(Blueprint $table) {
			$table->increments('id');
			$table->string('comp_nom', 255);
		});
	}

	public function down()
	{
		Schema::drop('competence');
	}
}