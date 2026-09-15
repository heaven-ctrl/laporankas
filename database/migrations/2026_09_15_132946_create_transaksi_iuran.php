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
        Schema::create('transaksi_iuran', function (Blueprint $table) {
            $table->id();
            $table->string("warga_id");
            $table->string("iuran_id");
            $table->string("bulan_tahun");
            $table->string("nominal");
            $table->string("tanggal_bayar");
            $table->string("no_kwitansi");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_iuran');
    }
};
