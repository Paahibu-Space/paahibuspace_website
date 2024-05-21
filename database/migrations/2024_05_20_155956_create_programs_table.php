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
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->longText('content')->nullable();
            $table->string('status')->nullable();
            $table->string('date');
            $table->string('time');
            $table->string('available_registrations');
            $table->string('image')->nullable();
            $table->text('venue')->nullable();
            $table->text('slug')->nullable();
            $table->text('venue_location')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
