<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('education',100);
			$table->string('description',2500);
			$table->string('country',100);
			$table->string('city',100);
			$table->string('region',100);
			$table->string('birthdate',100);
			$table->string('gender',100);
			$table->string('phone',100);
			$table->string('skills',250);
			$table->string('language',250);
			$table->rememberToken();
			$table->integer('image_id',10);
			$table->integer('work_history_id',10);
			$table->integer('favorite_id',10);

		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
