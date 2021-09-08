<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('residenttype');
            $table->string('document_type');
            $table->bigInteger('document');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('livein')->nullable();
            $table->string('job')->nullable();
            $table->string('address')->nullable();
            $table->string('lesseealert')->nullable();
            $table->integer('depositnum');
            $table->bigInteger('cardnum');
            $table->string('dateadmission')->nullable();
            $table->unsignedBigInteger('resident_id')->unique();
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
        Schema::dropIfExists('extras');
    }
}
