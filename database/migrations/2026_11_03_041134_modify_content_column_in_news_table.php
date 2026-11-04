<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Tambahkan kolom baru jika belum ada di tabel
            if (!Schema::hasColumn('news', 'type')) {
                $table->string('type')->default('external')->after('description');
            }
            if (!Schema::hasColumn('news', 'content')) {
                $table->longText('content')->nullable()->after('type');
            }
            if (!Schema::hasColumn('news', 'slug')) {
                $table->string('slug')->nullable()->after('content');
            }
            
            // Ubah kolom link agar boleh kosong (nullable)
            $table->string('link')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            if (Schema::hasColumn('news', 'type')) {
                $table->dropColumn('type');
            }
            if (Schema::hasColumn('news', 'content')) {
                $table->dropColumn('content');
            }
            if (Schema::hasColumn('news', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};