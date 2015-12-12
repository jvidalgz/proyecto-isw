<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre');
			$table->string('apellido_p',64);
			$table->string('apellido_m',64);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->string('url_avatar', 47);
			$table->softDeletes();
			$table->timestamps();
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
