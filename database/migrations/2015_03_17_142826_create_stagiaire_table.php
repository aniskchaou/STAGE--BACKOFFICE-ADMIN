<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagiaireTable extends Migration {

	public function up()
	{
		Schema::create('stagiaire', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('stage_id')->unsigned();
			$table->integer('etudiant_id')->unsigned();
			$table->string('grade', 15)->nullable();
			$table->string('valide',20)->nullable();
			$table->string('moyenne', 10)->nullable();
			$table->text('appreciation');
			$table->string('assurance_code', 50);
			$table->string('assurance_nom', 50)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('stagiaire');
	}
}