<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('race');
            $table->string('color');
            $table->Integer('age');
            $table->string('policy')->nullable();
            $table->boolean('card');
            $table->boolean('dangerous');
            $table->string('plaque');
            $table->string('species');
            $table->unsignedBigInteger('resident_id');
            $table->foreign('resident_id')->references('id')->on('residents');
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
        Schema::dropIfExists('pets');
    }
}
