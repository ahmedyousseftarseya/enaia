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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->dateTime('date');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->float('tax');
            $table->float('total');
            $table->boolean('is_return')->default(0);
            $table->foreignId('reservation_id')->constrained('reservations');
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
        Schema::dropIfExists('invoices');
    }
};
