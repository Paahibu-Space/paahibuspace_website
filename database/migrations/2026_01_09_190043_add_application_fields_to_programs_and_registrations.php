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
        Schema::table('programs', function (Blueprint $table) {
            $table->dateTime('application_start_date')->nullable();
            $table->dateTime('application_end_date')->nullable();
            $table->string('application_link')->nullable();
        });

        Schema::table('program_registration', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->text('notes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['application_start_date', 'application_end_date', 'application_link']);
        });

        Schema::table('program_registration', function (Blueprint $table) {
             $table->dropColumn(['name', 'email', 'phone', 'location', 'notes']);
        });
    }
};
