<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_users', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned(false)->length(11);
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('display_name',50)->nullable();
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('password');
            $table->string('photo',100)->nullable();
            $table->string('address_line_one',100)->nullable();
            $table->string('address_line_two',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('zip',10)->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('ip_address',50)->nullable();
            $table->rememberToken();
            $table->string('reset_token',100)->nullable();
            $table->string('reset_token_at',100)->nullable();
            $table->enum('status',array('0','1','2'))->default(1);
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
        Schema::dropIfExists('recipe_users');
    }
}
