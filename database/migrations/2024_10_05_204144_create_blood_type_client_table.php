<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTypeClientTable extends Migration {

	public function up()
	{
		Schema::create('blood_type_client', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained()->noActionOnDelete();
			$table->foreignId('blood_type_id')->constrained()->noActionOnDelete();
		});
	}

	public function down()
	{
		Schema::drop('blood_type_client');
	}
}