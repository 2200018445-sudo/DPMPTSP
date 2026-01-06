<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatUtama extends Model
{
    protected $fillable = [
        'nama_perangkat',
        'nama_pengguna',
        'jenis_perangkat',
        'id_perangkat',
        'os',
        'os_status',
        'ram_merk',
        'ram_kapasitas',
        'ssd_merk',
        'ssd_kapasitas',
        'hdd_merk',
        'hdd_kapasitas',
        'office_nama',
        'office_status',
        'tahun_produksi',
        'posisi',
        'pengguna',
        'status',
        'keterangan',
        'foto',
    ];
}
