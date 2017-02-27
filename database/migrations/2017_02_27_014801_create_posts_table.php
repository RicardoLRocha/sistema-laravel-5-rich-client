<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){

		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned(); 
			$table->string('title', 100)->unique();
			$table->string('foto', 100);
			$table->text('content');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}
}
