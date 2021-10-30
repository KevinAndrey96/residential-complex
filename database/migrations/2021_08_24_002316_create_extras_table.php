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
            $table->string('mobile')->nullable();
            $table->boolean('livein')->nullable();
            $table->string('job')->nullable();
            $table->string('address')->nullable();
            $table->boolean('lesseealert')->nullable();
            $table->integer('depositnum');
            $table->bigInteger('cardnum');
            $table->string('dateadmission')->nullable();
            $table->string('howcontribute')->nullable();
            $table->string('themes')->nullable();
            $table->string('name_invoice');
            $table->bigInteger('phone_invoice');
            $table->string('address_invoice');
            $table->string('razon_realestate')->nullable();
            $table->bigInteger('nit_realestate')->nullable();
            $table->string('name_realestate')->nullable();
            $table->string('email_realestate')->nullable();
            $table->bigInteger('phone_realestate')->nullable();
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
        Schema::dropIfExists('extras');
    }
}
