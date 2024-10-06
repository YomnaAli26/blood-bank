<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPostTable extends Migration {

	public function up()
	{
		Schema::create('client_post', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained()->noActionOnDelete();
			$table->foreignId('post_id')->constrained()->noActionOnDelete();
			$table->boolean('is_favourite');
		});
	}

	public function down()
	{
		Schema::drop('client_post');
	}
}
