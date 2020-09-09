<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactTable extends Migration {

	public function up()
	{
		Schema::create('contact', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('contact_nom', 100);
			$table->string('contact_email', 100);
			$table->string('contact_tel', 50);
			$table->string('contact_pays', 50);
			$table->string('contact_ville', 50);
			$table->string('contact_sujet', 255);
			$table->text('contact_message');
		});
	}

	public function down()
	{
		Schema::drop('contact');
	}
}