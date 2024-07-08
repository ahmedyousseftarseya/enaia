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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->date('from');
            $table->date('to');
            $table->time('time_from');
            $table->time('time_to')->nullable();
            $table->string('status');
            $table->float('service_cost');
            $table->float('shipping_cost');
            $table->float('discount')->default(0);
            $table->float('tax')->default(0);
            $table->float('final_total');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('coupon_id')->constrained('coupons');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('service_id')->constrained('services');
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
        Schema::dropIfExists('reservations');
    }
};
