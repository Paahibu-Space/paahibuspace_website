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
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_categories');
        Schema::dropIfExists('works');
        Schema::dropIfExists('works_categories');
        Schema::dropIfExists('knowledgebases');
        Schema::dropIfExists('knowledgebases_topics'); // Checking exact name
        Schema::dropIfExists('knowledgebase_topics'); // Just in case
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No rollback
    }
};
