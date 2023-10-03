<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSpaceOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_space_occupations', function (Blueprint $table) {
            $table->id();
            $table->string('visitant_name');
            $table->string('plate');
            $table->string('apto');
            $table->longText('arrival_observation')->nullable();
            $table->longText('departure_observation')->nullable();
            $table->unsignedBigInteger('parking_space_id');
            $table->foreign('parking_space_id')->references('id')->on('parking_spaces');
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
        Schema::dropIfExists('detail_space_occupations');
    }
}
