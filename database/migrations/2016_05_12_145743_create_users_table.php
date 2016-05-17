<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('empno')->unique();
      $table->string('avatar');
      $table->string('username');
      $table->string('fullname');
      $table->string('email')->unique();
      $table->string('password');
      $table->integer('phone');
      $table->string('address');
      $table->string('gender');
      $table->string('department');
      $table->string('position');
      $table->string('userlevel');
      $table->integer('active');
      $table->integer('online');
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
