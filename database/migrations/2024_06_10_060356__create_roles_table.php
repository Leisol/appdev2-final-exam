<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('name');
            $table->timestamps();
        });

        // Insert predefined roles
        DB::table('roles')->insert([
            ['name' => 'guest'],
            ['name' => 'registered'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
