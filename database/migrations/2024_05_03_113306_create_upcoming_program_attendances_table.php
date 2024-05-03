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
        Schema::create('upcoming_program_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->longText('content')->nullable();
            $table->string('topic_id')->nullable();
            $table->string('status')->nullable();
            $table->string('slug')->nullable();
            $table->string('views')->nullable();
            $table->string('lang')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_tags')->nullable();
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
