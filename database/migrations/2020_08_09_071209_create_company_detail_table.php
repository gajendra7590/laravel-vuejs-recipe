<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name',50)->nullable();
            $table->string('company_contact',50)->nullable();
            $table->string('company_mobile',50)->nullable();
            $table->string('company_email',100)->nullable();
            $table->string('company_logo',256)->nullable();
            $table->string('address_line_one',100)->nullable();
            $table->string('address_line_two',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('zip',15)->nullable();
            $table->string('website_url',100)->nullable();
            $table->string('youtube_url',100)->nullable();
            $table->string('facebook_url',100)->nullable();
            $table->string('twitter_url',100)->nullable();
            $table->string('linkedin_url',100)->nullable();
            $table->string('instagram_url',100)->nullable();
            $table->string('pinterest_url',100)->nullable();
            $table->string('telegram_url',100)->nullable();
            $table->string('latitude',100)->nullable();
            $table->string('longitude',100)->nullable();
            $table->longText('about')->nullable();
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
        Schema::dropIfExists('company_detail');
    }
}
