<?php

namespace App\Http\Controllers;

use App\Models\RequestPemeliharaan;
use App\Models\PerangkatUtama;
use App\Models\Periferal;
use Illuminate\Http\Request;

class RequestPemeliharaanController extends Controller
{
    
    
    public function index()
    {
        $requestPemeliharaans = RequestPemeliharaan::all();
        
        // Ambil data perangkat utama dan periferal
        $perangkatUtama = PerangkatUtama::all();
        $perangkatPeriferal = Periferal::all();
        
        return view('pages.requestpemeliharaan', compact('requestPemeliharaans', 'perangkatUtama', 'perangkatPeriferal'));
    }


    public function create()
    {
        // Ambil data perangkat utama dan periferal
        $perangkatUtama = PerangkatUtama::all();
        $perangkatPeriferal = Periferal::all();
        
        return view('pages.requestpemeliharaan', compact('perangkatUtama', 'perangkatPeriferal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_aduan'        => 'required|date',
            'jenis_perangkat'      => 'required|string',
            'kerusakan'            => 'required|string',
            'user_aduan'           => 'required|string',
            'tanggal_penanganan'   => 'nullable|date',
            'nama_penanganan'      => 'nullable|string',
            'tindakan'             => 'nullable|string',
            'status'               => 'required|string',
        ]);

        RequestPemeliharaan::create([
            'tanggal_aduan'        => $request->tanggal_aduan,
            'jenis_perangkat'      => $request->jenis_perangkat,
            'kerusakan'            => $request->kerusakan,
            'user_aduan'           => $request->user_aduan,
            'tanggal_penanganan'   => $request->tanggal_penanganan,
            'nama_penanganan'      => $request->nama_penanganan,
            'tindakan'             => $request->tindakan,
            'status'               => $request->status,
        ]);

        return redirect()
            ->route('riwayat')
            ->with('success', 'Request pemeliharaan berhasil disimpan');
    }

    public function edit($id)
    {
        $requestPemeliharaan = RequestPemeliharaan::findOrFail($id);
        
        // Ambil data perangkat untuk dropdown di form edit
        $perangkatUtama = PerangkatUtama::all();
        $perangkatPeriferal = Periferal::all();
        
        return view('pages.editpemeliharaan', compact('requestPemeliharaan', 'perangkatUtama', 'perangkatPeriferal'));
    }

    public function destroy($id)
    {
        $item = RequestPemeliharaan::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success','Data Pemeliharaan berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_aduan'        => 'required|date',
            'jenis_perangkat'      => 'required|string',
            'kerusakan'            => 'required|string',
            'user_aduan'           => 'required|string',
            'tanggal_penanganan'   => 'nullable|date',
            'nama_penanganan'      => 'nullable|string',
            'tindakan'             => 'nullable|string',
            'status'               => 'required|string',
        ]);

        $pemeliharaan = RequestPemeliharaan::findOrFail($id);

        $pemeliharaan->update($request->all());

        return redirect()
            ->route('riwayat')
            ->with('success', 'Data pemeliharaan berhasil diperbarui');
    }

    public function show($id)
    {
        $pemeliharaan = RequestPemeliharaan::findOrFail($id);
        return view('pages.detailpemeliharaan', compact('pemeliharaan'));
    }

    // ========== METHOD BARU: RIWAYAT PERANGKAT ==========
    public function riwayatPerangkat($id)
    {
        // Cek apakah ID ada di tabel perangkat utama
        $perangkat = PerangkatUtama::find($id);
        $jenisPerangkat = 'utama';
        
        // Jika tidak ada, cek di tabel perangkat periferal
        if (!$perangkat) {
            $perangkat = Periferal::find($id);
            $jenisPerangkat = 'periferal';
        }
        
        // Jika perangkat tidak ditemukan
        if (!$perangkat) {
            return redirect()->route('riwayat')->with('error', 'Perangkat tidak ditemukan');
        }
        
        // Ambil riwayat pemeliharaan berdasarkan nama perangkat
        $riwayatPemeliharaan = RequestPemeliharaan::where('jenis_perangkat', 'LIKE', '%' . $perangkat->nama_perangkat . '%')
            ->orderBy('tanggal_aduan', 'desc')
            ->get();
        
        return view('pages.riwayat-perangkat', compact('perangkat', 'riwayatPemeliharaan', 'jenisPerangkat'));
    }

}