<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeDocumentTable extends Migration {

	public function up()
	{
		Schema::create('type_document', function(Blueprint $table) {
			$table->increments('id');
			$table->string('doc_type_nom', 255);
			$table->string('etat_dispo', 255);
			$table->string('etat_indispo', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('type_document');
	}
}