<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned(false)->length(11);
            $table->string('name','256')->unique();
            $table->string('slug','256')->unique();
            $table->text('description')->nullable();
            $table->text('photo','256')->nullable(); 
            $table->enum('status', array('0', '1','2'))->default(1);
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
        Schema::dropIfExists('blog_categories');
    }
}
