<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Integer('age');
            $table->string('document_type');
            $table->string('document');
            $table->string('occupation');
            $table->string('kinship');
            $table->unsignedBigInteger('resident_id')->unique();
            $table->timestamps();
            $table->foreign('resident_id')->references('id')->on('residents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitants');
    }
}
