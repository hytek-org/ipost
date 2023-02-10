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
        Schema::create('profile_mains', function (Blueprint $table) {
            $table->id();
            $table->string('uname');
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->string('gender');
            $table->string('contact_no');
            $table->string('location');
            $table->string('profession');
            $table->text('short_desc');
            $table->string('facebook_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('linkdin_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('web_link')->nullable();


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
        Schema::dropIfExists('profile_mains');
    }
};
