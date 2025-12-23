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
    Schema::create('periferals', function (Blueprint $table) {
        $table->id();
        $table->string('nama_perangkat');
        $table->string('jenis_perangkat');
        $table->string('id_perangkat');
        $table->string('merk')->nullable();
        $table->string('tipe')->nullable();
        $table->string('posisi')->nullable();
        $table->string('pengguna')->nullable();
        $table->string('foto')->nullable();
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periferals');
    }
};
