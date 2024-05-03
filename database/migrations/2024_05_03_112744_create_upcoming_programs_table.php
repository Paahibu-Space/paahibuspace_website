<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('upcoming_programs', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->longText('content')->nullable();
            $table->string('category_id')->nullable();
            $table->string('status')->nullable();
            $table->string('date');
            $table->string('time');
            $table->string('available_slots');
            $table->string('image')->nullable();
            $table->text('venue')->nullable();
            $table->text('slug')->nullable();
            $table->text('venue_location')->nullable();
            $table->text('venue_phone')->nullable();
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
        //
    }
};
