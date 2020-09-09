<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffreDEmploiTable extends Migration {

	public function up()
	{
		Schema::create('offre_d_emploi', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ent_id')->unsigned();
			$table->string('emploi_titre', 255);
			$table->text('emploi_competence');
			$table->timestamp('emploi_date_fin');
			$table->smallInteger('emploi_nbr');
			$table->string('emploi_status',25);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('offre_d_emploi');
	}
}