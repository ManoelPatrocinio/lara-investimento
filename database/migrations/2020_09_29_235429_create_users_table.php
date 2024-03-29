<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');

            //people data

            $table->char('cpf',14)->unique()->nullable();
            $table->string('name',50);
            $table->char('phone',14);
            $table->date('birth')->nullable();
            $table->char('gender',9)->nullable();
            $table->text('notes')->nullable();

            //auth data

            $table->string('email',81)->unique();
            $table->string('password',254)->nullable();

            //permission
            $table->string('status')->default('active');
            $table->string('permission')->default('app.user');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table){

		});
		Schema::drop('users');
	}
}
