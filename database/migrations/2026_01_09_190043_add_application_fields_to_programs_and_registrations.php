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
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->dateTime('application_end_date')->nullable();
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->string('application_link')->nullable();
        });

        Schema::table('program_registration', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
        Schema::table('program_registration', function (Blueprint $table) {
            $table->string('email')->nullable();
        });
        Schema::table('program_registration', function (Blueprint $table) {
            $table->string('phone')->nullable();
        });
        Schema::table('program_registration', function (Blueprint $table) {
            $table->string('location')->nullable();
        });
        Schema::table('program_registration', function (Blueprint $table) {
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
