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
        Schema::create('perangkat_utamas', function (Blueprint $table) {
    $table->id();
    $table->string('nama_perangkat');
    $table->string('jenis_perangkat');
    $table->string('id_perangkat');
    $table->string('os');
    $table->string('os_status')->nullable();

    $table->string('ram_merk');
    $table->integer('ram_kapasitas');

    $table->string('ssd_merk')->nullable();
    $table->integer('ssd_kapasitas')->nullable();

    $table->string('hdd_merk')->nullable();
    $table->integer('hdd_kapasitas')->nullable();

    $table->string('office_nama')->nullable();
    $table->string('office_status')->nullable();

    $table->year('tahun_produksi');
    $table->string('posisi');
    $table->string('pengguna');
    $table->string('status');
    $table->text('keterangan')->nullable();
    $table->string('foto')->nullable();


    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_utamas');
    }
};
