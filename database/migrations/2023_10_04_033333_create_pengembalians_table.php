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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengembalian');
            $table->integer('denda')->constrained()->onDelete("cascade");
            $table->foreignId('buku_id')->constrained()->onDelete("cascade");
            $table->foreignId('anggota_id')->constrained()->onDelete("cascade");
            $table->foreignId('petugas_id')->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
