<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoutenanceJuryTable extends Migration {

	public function up()
	{
		Schema::create('soutenance_jury', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('soutenance_id')->unsigned();
			$table->integer('enseig_id')->unsigned();
			$table->string('qualite_id', 20);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('soutenance_jury');
	}
}