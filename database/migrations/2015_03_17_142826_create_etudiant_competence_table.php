<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtudiantCompetenceTable extends Migration {

	public function up()
	{
		Schema::create('etudiant_competence', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('comp_id')->unsigned();
			$table->integer('etudiant_id')->unsigned();
			$table->float('pr_competence', 3,2);
		});
	}

	public function down()
	{
		Schema::drop('etudiant_competence');
	}
}