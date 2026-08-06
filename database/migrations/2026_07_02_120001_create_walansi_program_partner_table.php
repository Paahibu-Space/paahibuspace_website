<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('walansi_program_partner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('partner_id')->constrained()->onDelete('cascade');
            $table->string('role_label')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->unique(['program_id', 'partner_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('walansi_program_partner');
    }
};
