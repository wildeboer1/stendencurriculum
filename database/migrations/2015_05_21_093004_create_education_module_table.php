<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('education_module', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('education_id')->unsigned();
			$table->foreign('education_id')->references('id')->on('educations');
			$table->integer('module_id')->unsigned();
			$table->foreign('module_id')->references('id')->on('modules');
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
		Schema::drop('education_module');
	}

}
