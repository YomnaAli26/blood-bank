<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientGovernorateTable extends Migration {

	public function up()
	{
		Schema::create('client_governorate', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained()->cascadeOnDelete();
			$table->foreignId('governorate_id')->constrained()->cascadeOnDelete();
		});
	}

	public function down()
	{
		Schema::drop('client_governorate');
	}
}
