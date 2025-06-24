<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::table('points', function (Blueprint $table) {
            $table->text('address')->nullable(); // Tambahkan kolom address
        });
    }

    public function down(): void {
        Schema::table('points', function (Blueprint $table) {
            $table->dropColumn('address'); // Hapus kolom saat rollback
        });
    }
};
