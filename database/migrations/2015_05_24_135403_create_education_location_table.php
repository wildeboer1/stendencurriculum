<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('education_location', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('education_id')->unsigned();
			$table->foreign('education_id')->references('id')->on('educations');
			$table->integer('location_id')->unsigned();
			$table->foreign('location_id')->references('id')->on('locations');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('education_location');
	}

}
