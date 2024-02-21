<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('national_id')->unique();
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female']);
            $table->string('nationality');
            $table->string('blood_group');
            $table->string('address');
            $table->string('status')->default('active');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->rememberToken()->nullable();
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
};
