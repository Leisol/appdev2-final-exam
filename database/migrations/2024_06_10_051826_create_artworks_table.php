<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id('artwork_id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('artist_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('upload_date');
            $table->string('medium');
            $table->string('dimensions');
            $table->string('image_url');
            $table->string('visibility')->default('public');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('artworks');
    }
};
