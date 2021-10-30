<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('plaque')->nullable();
            $table->string('type')->nullable();
            $table->string('color')->nullable();
            $table->string('parkingnum')->nullable();
            $table->string('ownparking')->nullable();
            $table->string('owner')->nullable();
            $table->string('numserie')->nullable();
            $table->string('bicyclerack')->nullable();
            $table->integer('bicycleperiod')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('transports');
    }
}
