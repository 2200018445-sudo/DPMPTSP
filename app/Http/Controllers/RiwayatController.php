<?php

namespace App\Http\Controllers;

use App\Models\PerangkatUtama;
use App\Models\Periferal;
use App\Models\RequestPemeliharaan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    // Halaman Riwayat Gabungan - redirect ke pemeliharaan
    public function index()
    {
        return redirect()->route('riwayat.pemeliharaan');
    }

    // Halaman Riwayat Perangkat Utama
    public function riwayatPerangkatUtama(Request $request)
    {
        $search = $request->input('search');
        
        $perangkatUtamas = PerangkatUtama::query()
            ->when($search, function($query, $search) {
                return $query->where('nama_perangkat', 'like', "%{$search}%")
                            ->orWhere('jenis_perangkat', 'like', "%{$search}%")
                            ->orWhere('status', 'like', "%{$search}%")
                            ->orWhere('keterangan', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Maintain search query in pagination
        
        return view('pages.riwayat-perangkat-utama', compact('perangkatUtamas'));
    }

    // Halaman Riwayat Periferal
    public function riwayatPeriferal(Request $request)
    {
        $search = $request->input('search');
        
        $periferals = Periferal::query()
            ->when($search, function($query, $search) {
                return $query->where('id_perangkat', 'like', "%{$search}%")
                            ->orWhere('jenis_perangkat', 'like', "%{$search}%")
                            ->orWhere('tipe', 'like', "%{$search}%")
                            ->orWhere('posisi', 'like', "%{$search}%")
                            ->orWhere('pengguna', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        
        return view('pages.riwayat-periferal', compact('periferals'));
    }

    // Halaman Riwayat Pemeliharaan
    public function riwayatPemeliharaan(Request $request)
    {
        $search = $request->input('search');
        
        $requestPemeliharaans = RequestPemeliharaan::query()
            ->when($search, function($query, $search) {
                return $query->where('user_aduan', 'like', "%{$search}%")
                            ->orWhere('kerusakan', 'like', "%{$search}%")
                            ->orWhere('nama_penanganan', 'like', "%{$search}%")
                            ->orWhere('tindakan', 'like', "%{$search}%")
                            ->orWhere('status', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        
        return view('pages.riwayat-pemeliharaan', compact('requestPemeliharaans'));
    }

    
}