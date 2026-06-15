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
        Schema::create('transaksi_nasabah', function (Blueprint $table) {
            $table->id();
            
            $table->string('nama_nasabah');
            $table->date('tanggal_transaksi');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('nominal');

            $table->foreignId('bank_id')
                ->constrained('bank')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('bank_branch_id')
                ->nullable()
                ->constrained('bank_branches')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->enum('status', ['Belum','Lunas']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_nasabah');
    }
};
