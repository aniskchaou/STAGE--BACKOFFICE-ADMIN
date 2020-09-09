<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentTable extends Migration {

	public function up()
	{
		Schema::create('document', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('type_stage_id')->unsigned();
			$table->integer('doc_type_id')->unsigned();
			$table->integer('filiere_id')->unsigned();
			$table->text('doc_text');
		});
	}

	public function down()
	{
		Schema::drop('document');
	}
}