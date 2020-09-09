<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigurationTable extends Migration {

	public function up()
	{
		Schema::create('configuration', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nomdusite', 255);
			$table->string('email', 255);
			$table->string('abr_institut', 255);
			$table->string('anne_universitaire', 9);
			$table->string('appelation_enseignant', 50);
			$table->smallInteger('soutenance_dur_max');
			$table->smallInteger('pr_reservation');
			$table->smallInteger('lon_nom_org');
			$table->smallInteger('lon_sta_juridi');
			$table->smallInteger('lon_max_email');
			$table->smallInteger('lon_max_adrese');
			$table->smallInteger('lon_max_site_web');
			$table->smallInteger('lon_max_pwd');
			$table->smallInteger('lon_min_pwd');
			$table->integer('temps_redirection');
			$table->integer('nbr_elemont');
			$table->string('type_lien', 20);
			$table->string('mois_deb_anne', 20);
			$table->text('introdu');
		});
	}

	public function down()
	{
		Schema::drop('Configuration');
	}
}
