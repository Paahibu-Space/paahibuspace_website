<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('programs')->updateOrInsert(
            ['slug' => 'skills2work-program'],
            [
                'name' => 'Skills2Work',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    public function down(): void
    {
        DB::table('programs')->where('slug', 'skills2work-program')->delete();
    }
};
