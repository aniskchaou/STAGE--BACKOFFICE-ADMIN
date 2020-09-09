<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnseignantTable extends Migration {

	public function up()
	{
		Schema::create('enseignant', function(Blueprint $table) {
			$table->increments('id');
			$table->string('enseig_code', 20)->unique();
			$table->string('enseig_prenom', 20);
			$table->string('enseig_nom', 20);
			$table->string('enseig_sexe', 10);
			$table->string('enseig_tel', 15)->nullable();
			$table->string('enseig_mobile', 15)->nullable();
			$table->string('enseig_adresse', 255);
			$table->string('enseig_grade_code', 255)->nullable();
			$table->string('enseig_grade_nom', 255)->nullable();
			$table->string('enseig_specialite_code', 255)->nullable();
			$table->string('enseig_specialite_nom', 255)->nullable();
			$table->string('enseig_status_code', 255)->nullable();
			$table->string('enseig_status_nom', 255)->nullable();
			$table->string('email', 255)->unique();
			$table->string('password', 250);
			$table->rememberToken('rememberToken');
			$table->tinyInteger('enseig_status')->nullable()->default('1');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('enseignant');
	}
}