<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned(false)->length(11);
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('title')->unique();
            $table->string('slug','100')->unique();
            $table->longText('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->string('photo',100)->nullable();
            $table->string('prepairation_time',50)->nullable();
            $table->string('cooking_time',50)->nullable();
            $table->string('serving_peoples',50)->nullable();
            $table->enum('is_slider',array('0','1'))->default(0);
            $table->enum('status',array('0','1','2'))->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('recipe_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('recipe_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
