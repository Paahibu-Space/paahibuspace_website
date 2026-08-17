<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->foreignId('partner_category_id')->nullable()->after('id')->constrained('partner_categories')->nullOnDelete();
            $table->string('relationship')->nullable()->after('website_url');
            $table->string('programme_initiative')->nullable()->after('relationship');
            $table->string('period')->nullable()->after('programme_initiative');
            $table->text('contribution')->nullable()->after('period');
            $table->text('attribution_requirements')->nullable()->after('contribution');
        });
    }

    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropConstrainedForeignId('partner_category_id');
            $table->dropColumn(['relationship', 'programme_initiative', 'period', 'contribution', 'attribution_requirements']);
        });
    }
};
