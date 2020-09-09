<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtudiantTable extends Migration {

	public function up()
	{
		Schema::create('etudiant', function(Blueprint $table) {
			$table->increments('id');
			$table->string('etudiant_cin', 8)->unique();
			$table->string('etudiant_mat', 7)->unique();
			$table->string('etudiant_prenom', 30);
			$table->string('etudiant_image', 500);
			$table->string('etudiant_nom', 30);
			$table->string('etudiant_sexe', 10);
			$table->date('etudiant_date_nissance');
			$table->string('etudiant_lieu_naissance', 30);
			$table->string('etudiant_rue', 255);
			$table->string('etudiant_ville', 30);
			$table->string('etudiant_region', 20);
			$table->string('etudiant_adresse', 255);
			$table->string('etudiant_tel', 15)->nullable();
			$table->string('email', 50)->unique();
			$table->string('etudiant_rebouble', 255)->nullable();
			$table->string('etudiant_moda', 255)->nullable();
			$table->integer('etudiant_filiere_id')->unsigned();
			$table->string('etudiant_niveau', 255)->nullable();
			$table->string('etudiant_group_code', 255)->nullable();
			$table->string('etudiant_group_name', 255)->nullable();
			$table->tinyInteger('etudiant_status')->nullable()->default('1');
			$table->timestamps();
			$table->rememberToken('rememberToken');
			$table->string('password', 255);
		});
	}

	public function down()
	{
		Schema::drop('etudiant');
	}
}