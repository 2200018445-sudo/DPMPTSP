<?php

namespace App\Http\Controllers;

use App\Models\PerangkatUtama;
use App\Models\Periferal;
use App\Models\RequestPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatUtamaController extends Controller
{
    // =========================
    // LIST DATA
    // =========================
    public function index()
    {
        $perangkatUtamas = PerangkatUtama::latest()->get();
        return view('pages.perangkatutama', compact('perangkatUtamas'));
    }

    // =========================
    // SIMPAN DATA BARU
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_perangkat'  => 'required',
            'jenis_perangkat' => 'required',
            'id_perangkat'    => 'required',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // default foto NULL
        $fotoPath = null;

        // upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')
                                ->store('perangkatutama', 'public');
        }

        PerangkatUtama::create([
            'nama_perangkat'  => $request->nama_perangkat,
            'jenis_perangkat' => $request->jenis_perangkat,
            'id_perangkat'    => $request->id_perangkat,
            'os'              => $request->os,
            'ram_merk'        => $request->ram_merk,
            'ram_kapasitas'   => $request->ram_kapasitas,
            'ssd_merk'        => $request->ssd_merk,
            'ssd_kapasitas'   => $request->ssd_kapasitas,
            'hdd_merk'        => $request->hdd_merk,
            'hdd_kapasitas'   => $request->hdd_kapasitas,
            'office_nama'     => $request->office_nama,
            'office_status'   => $request->office_status,
            'tahun_produksi'  => $request->tahun_produksi,
            'posisi'          => $request->posisi,
            'pengguna'        => $request->pengguna,
            'status'          => $request->status,
            'keterangan'      => $request->keterangan,
            'foto'            => $fotoPath,
        ]);

        return redirect()
            ->route('riwayat')
            ->with('success', 'Data perangkat utama berhasil disimpan');
    }

    // =========================
    // HALAMAN EDIT
    // =========================
    public function edit($id)
    {
        $perangkat = PerangkatUtama::findOrFail($id);
        return view('pages.editPU', compact('perangkat'));
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_perangkat'  => 'required',
        'jenis_perangkat' => 'required',
        'id_perangkat'    => 'required',
        'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $perangkat = PerangkatUtama::findOrFail($id);

    // upload foto baru jika ada
    if ($request->hasFile('foto')) {

        // hapus foto lama
        if ($perangkat->foto) {
            Storage::disk('public')->delete($perangkat->foto);
        }

        $perangkat->foto = $request->file('foto')->store('perangkatutama', 'public');
    }

    // update semua field
    $perangkat->update([
        'nama_perangkat'  => $request->nama_perangkat,
        'jenis_perangkat' => $request->jenis_perangkat,
        'id_perangkat'    => $request->id_perangkat,
        'os'              => $request->os,
        'ram_merk'        => $request->ram_merk,
        'ram_kapasitas'   => $request->ram_kapasitas,
        'ssd_merk'        => $request->ssd_merk,
        'ssd_kapasitas'   => $request->ssd_kapasitas,
        'hdd_merk'        => $request->hdd_merk,
        'hdd_kapasitas'   => $request->hdd_kapasitas,
        'office_nama'     => $request->office_nama,
        'office_status'   => $request->office_status,
        'tahun_produksi'  => $request->tahun_produksi,
        'posisi'          => $request->posisi,
        'pengguna'        => $request->pengguna,
        'status'          => $request->status,
        'keterangan'      => $request->keterangan,
        'foto'            => $perangkat->foto, // ✅ tambahkan ini
    ]);

    return redirect()
        ->route('riwayat')
        ->with('success', 'Data perangkat berhasil diperbarui');
}


    // =========================
    // HAPUS DATA
    // =========================
    public function destroy($id)
    {
        $perangkat = PerangkatUtama::findOrFail($id);

        if ($perangkat->foto) {
            Storage::disk('public')->delete($perangkat->foto);
        }

        $perangkat->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    // =========================
    // DETAIL
    // =========================
    public function show($id)
    {
        $perangkat = PerangkatUtama::findOrFail($id);
        return view('pages.detailpu', compact('perangkat'));
    }

    // =========================
    // RIWAYAT
    // =========================
    public function getRequestPemeliharaan()
    {
        $perangkatUtamas     = PerangkatUtama::latest()->get();
        $periferals          = Periferal::latest()->get();
        $requestPemeliharaan = RequestPemeliharaan::latest()->get();

        return view('pages.riwayat', compact(
            'perangkatUtamas',
            'periferals',
            'requestPemeliharaan'
        ));
    }
}
