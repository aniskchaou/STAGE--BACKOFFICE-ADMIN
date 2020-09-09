<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntrepriseTable extends Migration {

	public function up()
	{
		Schema::create('entreprise', function(Blueprint $table) {
			$table->increments('id');
			$table->string('ent_nom', 50);
			$table->string('ent_statut_juridique', 50);
			$table->integer('secteur_id')->unsigned();
			$table->smallInteger('ent_nbr');
			$table->string('ent_adresse', 100)->nullable();
			$table->string('ent_pays', 100);
			$table->string('ent_ville', 100)->nullable();
			$table->string('ent_fax', 20)->nullable();
			$table->string('ent_tel', 20)->nullable();
			$table->string('ent_web', 255)->nullable();
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->rememberToken('rememberToken');
			$table->tinyInteger('ent_status')->nullable()->default('1');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('entreprise');
	}
}