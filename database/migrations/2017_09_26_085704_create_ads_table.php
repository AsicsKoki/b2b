<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('description', 100);
			$table->string('category', 100);
			$table->string('job_type', 100);
			$table->string('term', 100);
			$table->string('company_id', 100);
			$table->string('career_level', 100);
			$table->string('students', 100);
			$table->string('country', 100);
			$table->string('city', 100);
			$table->string('salary_type', 100);
			$table->string('salary_from', 100);
			$table->string('salary_to', 100);
			$table->string('foreign_languages', 100);
			$table->string('questionnaire_id', 100);
			$table->string('external_url', 100);
			$table->string('position', 100);
		});
	}

	public function down()
	{
		Schema::drop('ads');
	}
}