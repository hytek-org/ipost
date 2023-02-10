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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('uname');
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('contact_no');
            $table->string('location');
            $table->string('profession');
            $table->string('short_desc');
            

            $table->string('facebook_link');
            $table->string('insta_link');
            $table->string('twitter_link');
            $table->string('youtube_link');
            $table->string('linkdin_link');
            $table->string('github_link');
            $table->string('web_link');


            $table->string('img_path');
            $table->string('header_img_path');
            
          
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
           
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
        Schema::dropIfExists('profile');
    }
};
