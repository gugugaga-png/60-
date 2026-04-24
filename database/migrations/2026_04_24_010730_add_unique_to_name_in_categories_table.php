<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Mengubah kolom 'name' menjadi unique
            $table->string('name')->unique()->change();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Menghapus constraint unique jika migrasi di-rollback
            $table->dropUnique(['name']);
        });
    }
};
