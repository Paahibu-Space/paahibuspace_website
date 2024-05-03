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
        Schema::create('upcoming_program_attendance', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pending');
            $table->string('program_name')->nullable();
            $table->string('checkout_type')->nullable();
            $table->integer('user_id',false,true)->nullable();
            $table->string('program_id')->nullable();
            $table->longText('custom_fields')->nullable();
            $table->longText('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcoming_program_attendance');
    }
};
