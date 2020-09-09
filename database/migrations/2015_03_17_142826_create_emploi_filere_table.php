<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmploiFilereTable extends Migration {

	public function up()
	{
		Schema::create('emploi_filere', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('emploi_id')->unsigned();
			$table->integer('filiere_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('emploi_filere');
	}
}