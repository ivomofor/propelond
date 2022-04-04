<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('email')->unique();
            $table->integer('phone_number')->nullable()->default(null);
            $table->longText('about')->nullable()->default(null);
            $table->string('avatar')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('occupation')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('primary_school')->nullable();
            $table->string('secondary_school')->nullable();
            $table->string('university')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
