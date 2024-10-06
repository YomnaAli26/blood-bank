<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->id();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->string('patient_age');
			$table->foreignId('blood_type_id')->constrained()->noActionOnDelete();
			$table->string('bags_num');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->decimal('latitude', 10,2);
			$table->decimal('longitude', 10,2);
			$table->foreignId('city_id')->constrained()->noActionOnDelete();
			$table->longText('notes');
			$table->foreignId('client_id')->constrained()->noActionOnDelete();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
