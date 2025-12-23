<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPemeliharaan extends Model
{
    use HasFactory;

    protected $table = 'request_pemeliharaans';

    protected $fillable = [
        'tanggal_aduan',
        'kerusakan',
        'user_aduan',
        'tanggal_penanganan',
        'nama_penanganan',
        'tindakan',
        'status',
    ];
}
