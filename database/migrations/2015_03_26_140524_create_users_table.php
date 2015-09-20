<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('nickname')->unique()->nullable();
            $table->bigInteger('facebook_id')->nullable();
            $table->bigInteger('twitter_id')->nullable();
            $table->string('avatar');
            $table->string('url');
            $table->string('twitter_url');
            $table->string('instagram_url');
            $table->string('password', 60);
            $table->string('trust', 1)->default('N');
            $table->string('admin', 1)->default('N');
            $table->rememberToken();
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
		Schema::drop('users');
	}

}
