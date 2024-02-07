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
        Schema::create('head_nurse_nurses', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('head_nurse_id')->constrained('head_nurses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nurse_id')->constrained('nurses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['head_nurse_id', 'nurse_id']);
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
        Schema::dropIfExists('head_nurse_nurses');
    }
};
