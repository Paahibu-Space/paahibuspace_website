<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('stories');

        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('story_type_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('role');
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->string('image'); // Store file path
            $table->text('quote');
            $table->text('short_story');
            $table->string('full_story_heading')->nullable();
            $table->longText('full_story_content')->nullable();
            $table->boolean('is_published')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
