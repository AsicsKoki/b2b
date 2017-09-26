<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('password', 100);
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}