<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFiliereTable extends Migration {

	public function up()
	{
		Schema::create('filiere', function(Blueprint $table) {
			$table->increments('id');
			$table->string('filiere_nom', 255)->unique();
			$table->integer('enseig_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('filiere');
	}
}