<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First add the new author column for storing admin name as string
        Schema::table('blog_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_posts', 'author')) {
                $table->string('author')->nullable()->after('featured_image');
            }
        });
        
        // Try to drop foreign key constraint if it exists
        try {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->dropForeign(['author_id']);
            });
        } catch (\Exception $e) {
            // Foreign key might not exist, continue
        }
        
        // Modify author_id to be nullable
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable()->change();
        });
        
        // Try to recreate the foreign key as nullable
        try {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->foreign('author_id')->references('id')->on('team_members')->onDelete('set null');
            });
        } catch (\Exception $e) {
            // Foreign key might already exist or team_members table might not exist
        }
    }

    public function down(): void
    {
        // Try to drop the foreign key
        try {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->dropForeign(['author_id']);
            });
        } catch (\Exception $e) {
            // Ignore if doesn't exist
        }
        
        // Revert author_id to NOT NULL
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable(false)->change();
        });
        
        // Try to recreate original foreign key
        try {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->foreign('author_id')->references('id')->on('team_members')->onDelete('cascade');
            });
        } catch (\Exception $e) {
            // Ignore if can't recreate
        }
        
        // Drop the author column
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn('author');
        });
    }
};
