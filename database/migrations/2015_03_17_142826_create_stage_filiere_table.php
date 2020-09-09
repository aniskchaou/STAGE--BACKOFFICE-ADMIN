<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStageFiliereTable extends Migration {

	public function up()
	{
		Schema::create('stage_filiere', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('stage_id')->unsigned();
			$table->integer('filiere_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('stage_filiere');
	}
}