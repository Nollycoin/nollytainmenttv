<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.4.1)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 200);
            $table->string('password', 500)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('phone_country_code', 30)->nullable();
            $table->integer('last_profile')->nullable();
            $table->string('last_profile_name', 50)->nullable();
            $table->integer('is_admin')->nullable();
            $table->integer('is_subscriber')->nullable();
            $table->integer('subscription_expiration')->nullable();
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
        Schema::dropIfExists('users');
    }
}
