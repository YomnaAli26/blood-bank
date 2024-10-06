<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->id();
			$table->string('message_title');
			$table->longText('message_content');
			$table->foreignId('client_id')->constrained()->noActionOnDelete();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}
