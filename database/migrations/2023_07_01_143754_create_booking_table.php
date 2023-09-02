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
            $table->integer('cost');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('lessor_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            
            
            $table->foreign('lessor_id')->references('id')->on('lessor');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('car');

            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); 
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
