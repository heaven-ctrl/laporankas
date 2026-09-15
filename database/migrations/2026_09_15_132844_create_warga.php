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
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->string("nik",30);
            $table->string("nama",150);
            $table->string("no_rumah",50);
            $table->string("no_hp",30)->nullable("");
            $table->enum("status_hunian",["Kontrak","Pemilik","Penyewa"]);
            $table->boolean("status_aktif");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
