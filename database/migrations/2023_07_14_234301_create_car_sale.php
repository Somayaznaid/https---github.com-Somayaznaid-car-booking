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
        Schema::create('car_sale', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->string("mileage");
            $table->string("transmission");
            $table->string("seats");
            $table->string("luggage");
            $table->string("fuel");
            $table->string("img_1");
            $table->string("img_2");
            $table->string("img_3");
            $table->string("city");
            $table->integer("price");
            $table->year("year_of_manufacture");
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key column
            $table->foreign('user_id') // Define foreign key constraint
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->unsignedBigInteger('lessor_id'); // Foreign key column
            $table->foreign('lessor_id') // Define foreign key constraint
            ->references('id')
            ->on('lessor')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_sale');
    }
};
