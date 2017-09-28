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
			$table->string('register_type', 100);
			$table->string('pib', 100);
			$table->string('foreign_name', 100);
			$table->string('company_type', 100);
			$table->string('sector', 100);
			$table->string('website', 100);
			$table->string('phone', 100);
			$table->string('address', 100);
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('position', 100);
			$table->string('business_phone', 100);
			$table->string('business_email', 100);
			$table->string('newsletter', 100);
			$table->string('username', 100);
			$table->string('is_manager', 100);
			$table->string('manager_first_name', 100);
			$table->string('manager_last_name', 100);
			$table->string('manager_position', 100);
			$table->string('manager_phone', 100);
			$table->string('manager_email', 100);
			$table->string('administrative_contact_first_name', 100);
			$table->string('administrative_contact_last_name', 100);
			$table->string('administrative_contact_position', 100);
			$table->string('administrative_contact_business_phone', 100);
			$table->string('administrative_contact_business_email', 100);
			$table->string('key', 100);
			$table->boolean('active');
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}