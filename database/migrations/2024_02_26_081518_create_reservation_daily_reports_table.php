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
        Schema::create('reservation_daily_reports', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->dateTime('datetime');
            $table->text('evaluation')->nullable();
            $table->text('improvement')->nullable();
            $table->foreignId('reservation_id')->constrained('reservations');
            $table->foreignId('nurse_id')->constrained('nurses');
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
        Schema::dropIfExists('reservation_daily_reports');
    }
};
