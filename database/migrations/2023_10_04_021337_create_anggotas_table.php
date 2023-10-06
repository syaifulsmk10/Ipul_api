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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_anggota', 20);
            $table->string('nama_anggota');
            $table->enum('jk_anggota', ["L", "P"]);
            $table->string('jurusan_anggota', 4);
            $table->string('no_telp_anggota', 20);
            $table->string('alamat_anggota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
