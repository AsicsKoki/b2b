<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdCategoryTable extends Migration {

	public function up()
	{
		Schema::create('ad_category', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('ad_id')->unsigned();
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ad_category');
	}
}