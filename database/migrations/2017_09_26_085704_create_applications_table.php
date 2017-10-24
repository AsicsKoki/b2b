<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration {

	public function up()
	{
		Schema::create('applications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id');
			$table->integer('ad_id');
			$table->integer('company_id');
			$table->integer('notiffication')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('applications');
	}
}