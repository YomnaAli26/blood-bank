<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('password');
			$table->string('code')->nullable();
			$table->date('b_o_d');
			$table->date('last_donation_date');
            $table->foreignId('blood_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
