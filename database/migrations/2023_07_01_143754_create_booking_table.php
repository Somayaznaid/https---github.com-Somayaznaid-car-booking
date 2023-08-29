<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('start_location');
            $table->string('end_location');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->unsignedBigInteger('lessor_id');
            $table->unsignedBigInteger('user_id');
            
            
            $table->foreign('lessor_id')->references('id')->on('lessor');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
