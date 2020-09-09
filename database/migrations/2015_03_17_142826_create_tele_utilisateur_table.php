<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeleUtilisateurTable extends Migration {

	public function up()
	{
		Schema::create('tele_utilisateur', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tele_id')->unsigned();
			$table->string('utilisa_type', 25);
		});
	}

	public function down()
	{
		Schema::drop('tele_utilisateur');
	}
}