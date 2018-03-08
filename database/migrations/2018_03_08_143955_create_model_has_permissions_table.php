<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelHasPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('model_has_permissions', function(Blueprint $table)
		{
			$table->integer('permission_id');
			$table->integer('model_id');
			$table->string('model_type', 191);
			$table->primary(['permission_id','model_id','model_type'], 'model_has_permissions_permission_id_model_id_model_type_primary');
			$table->index(['model_id','model_type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('model_has_permissions');
	}

}
