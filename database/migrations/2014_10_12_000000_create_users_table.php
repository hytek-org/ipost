<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
        
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('uname')->nullable()->unique();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('location')->nullable();
            $table->string('profession')->nullable();
            $table->text('short_desc')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('linkdin_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('web_link')->nullable();


            $table->string('img_path')->nullable();
            $table->string('header_img_path')->nullable();
           
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
};
