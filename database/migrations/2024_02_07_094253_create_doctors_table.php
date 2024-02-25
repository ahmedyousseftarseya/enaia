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
        Schema::create('doctors', static function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->string('email')->nullable()->unique();
            $table->foreignId('specialization_id')->constrained('specializations')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('doctors');
    }
};
