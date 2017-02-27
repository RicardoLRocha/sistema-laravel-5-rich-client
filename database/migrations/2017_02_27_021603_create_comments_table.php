<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 public function up(){

		Schema::create('comments', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('post_id')->unsigned(); 
			$table->string('subject', 100);
			$table->text('comment');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

		});

	}

	/**
	 * tiarara un paso atras o eliminara la tabla
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('comments');
	}
}
