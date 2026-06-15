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

            $table->unsignedBigInteger('insentif_ao')
                ->nullable()
                ->after('nominal');
            
            $table->unsignedBigInteger('insentif_sp')
                ->nullable()
                ->after('insentif_ao');
            
            $table->unsignedBigInteger('insentif_adk')
                ->nullable()
                ->after('insentif_sp');
            
            $table->unsignedBigInteger('insentif_pinca')
                ->nullable()
                ->after('insentif_adk');

            $table->unsignedBigInteger('insentif_mp_spb')
                ->nullable()
                ->after('insentif_pinca');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_nasabah', function (Blueprint $table) {

            $table->dropColumn([
                'insentif_ao',
                'insentif_sp',
                'insentif_adk',
                'insentif_pinca',
                'insentif_mp_spb',
            ]);
        });
    }
};
