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
        Schema::create('lessor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('phone');
            $table->string('address');
            $table->string('status')->default("offline");
            $table->string('img')->default("https://img.freepik.com/free-icon/user_318-563642.jpg?w=360");
            $table->unsignedBigInteger('role_id'); // Foreign key column
            $table->foreign('role_id') // Define foreign key constraint
            ->references('id')
            ->on('role')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessor');
    }
};
