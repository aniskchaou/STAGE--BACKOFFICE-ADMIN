<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStageReservationTable extends Migration {

	public function up()
	{
		Schema::create('stage_reservation', function(Blueprint $table) {
			$table->integer('id')->primary()->unsigned();
			$table->integer('etudiant_id')->unsigned();
			$table->integer('stage_id')->unsigned();
			$table->text('motivation')->nullable();
			$table->boolean('pre_affecte')->nullable()->default(false);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('stage_reservation');
	}
}