<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompetenceEnseignantTable extends Migration {

	public function up()
	{
		Schema::create('competence_enseignant', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('comp_id')->unsigned();
			$table->integer('enseig_id')->unsigned();
			$table->float('pr_competence', 3,2);
		});
	}

	public function down()
	{
		Schema::drop('competence_enseignant');
	}
}