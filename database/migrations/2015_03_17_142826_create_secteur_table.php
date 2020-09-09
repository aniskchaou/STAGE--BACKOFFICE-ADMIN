<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecteurTable extends Migration {

	public function up()
	{
		Schema::create('secteur', function(Blueprint $table) {
			$table->increments('id');
			$table->string('secteur_nom', 255);
		});
	}

	public function down()
	{
		Schema::drop('secteur');
	}
}