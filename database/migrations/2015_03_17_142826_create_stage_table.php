<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStageTable extends Migration {

	public function up()
	{
		Schema::create('stage', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('type_id')->unsigned();
			$table->integer('entreprise_id')->unsigned()->nullable();
			$table->string('stage_title', 255);
			$table->date('stage_dete_debut');
			$table->date('stage_dete_fin');
			$table->smallInteger('stage_nbr_etudiant');
			$table->text('stage_sujet');
			$table->string('stage_book', 50);
			$table->string('stage_annee_universitaire', 9);
			$table->string('stage_encadreur_s', 20);
			$table->string('stage_status', 50);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('stage');
	}
}