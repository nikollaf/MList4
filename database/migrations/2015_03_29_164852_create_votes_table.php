<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('ip', 50);
            $table->integer('user_id');
			$table->decimal('vote1', 3, 2);
			$table->decimal('vote2', 3, 2);
			$table->decimal('vote3', 3, 2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votes');
	}

}
