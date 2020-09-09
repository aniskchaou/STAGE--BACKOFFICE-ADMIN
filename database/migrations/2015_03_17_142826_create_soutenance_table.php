<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoutenanceTable extends Migration {

	public function up()
	{
		Schema::create('soutenance', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('salle_id')->unsigned()->nullable();
			$table->integer('stage_id')->unsigned();
			$table->timestamp('soute_date_debut');
			$table->timestamp('soute_date_fin')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('soutenance');
	}
}