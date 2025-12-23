<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('request_pemeliharaans', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal_aduan');
        $table->string('kerusakan');
        $table->string('user_aduan');
        $table->date('tanggal_penanganan')->nullable();
        $table->string('nama_penanganan')->nullable();
        $table->text('tindakan')->nullable();
        $table->enum('status', ['Pending', 'Selesai'])->default('Pending');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('request_pemeliharaans');
    }
};
