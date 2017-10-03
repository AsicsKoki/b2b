<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BussinessCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('buisness_card', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('company_id')->unsigned();
            $table->string('main_activity', 100);
            $table->string('founded_in', 100);
            $table->integer('number_of_employees');
            $table->string('locations', 100);
            $table->string('benefits', 100);
            $table->string('technologies', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
