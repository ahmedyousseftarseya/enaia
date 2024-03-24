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
        Schema::create('reservation_daily_report_details', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('task');
            
            $table->unsignedBigInteger('reservation_daily_report_id');
            $table->foreign('reservation_daily_report_id', 'reservation_daily_report_id_foreign')->references('id')->on('reservation_daily_reports');
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
        Schema::dropIfExists('reservation_daily_report_details');
    }
};
