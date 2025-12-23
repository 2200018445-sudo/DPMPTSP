<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periferal extends Model
{
    protected $fillable = [
        'nama_perangkat',
        'jenis_perangkat',
        'id_perangkat',
        'merk',
        'tipe',
        'posisi',
        'pengguna',
        'keterangan',
        'foto',
        
        
    ];
}
