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
        Schema::create('collection_artworks', function (Blueprint $table) {
            $table->id('collection_artworks_id');
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('artwork_id');
            $table->timestamps();

            // Ensure unique combination of collection_id and artwork_id
            $table->unique(['collection_id', 'artwork_id']);

            $table->foreign('collection_id')->references('collection_id')->on('collections')->onDelete('cascade');
            $table->foreign('artwork_id')->references('artwork_id')->on('artworks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('collection_artworks');
    }
};
