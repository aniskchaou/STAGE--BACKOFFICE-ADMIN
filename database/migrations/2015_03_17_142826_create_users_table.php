<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('type_id')->nullable();
			$table->string('name', 30);
			$table->string('tel', 15)->nullable();
			$table->string('prenom', 50)->nullable();
			$table->string('nom', 50)->nullable();
			$table->string('email', 255)->unique();
			$table->string('password', 60);
			$table->timestamps();
			$table->boolean('status')->nullable()->default(true);
			$table->rememberToken('rememberToken');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}