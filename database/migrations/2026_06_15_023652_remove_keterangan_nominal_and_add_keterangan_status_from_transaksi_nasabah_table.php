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
        Schema::table('transaksi_nasabah', function (Blueprint $table) {
            $table->dropColumn([
                'keterangan',
                'nominal',
            ]);

            $table->text('keterangan_status')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_nasabah', function (Blueprint $table) {
            $table->dropColumn('keterangan_status');

            $table->text('keterangan')->nullable()->after('tanggal_transaksi');

            $table->unsignedBigInteger('nominal')->after('keterangan');
        });
    }
};
