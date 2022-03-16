<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_documents', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('given_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('profession')->nullable();
            $table->integer('unique_identification_number')->nullable();
            $table->string('place_of_pick')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->longText('description')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('lost_documents');
    }
}
