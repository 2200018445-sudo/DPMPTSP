<?php

namespace App\Http\Controllers;

use App\Models\Periferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeriferalController extends Controller
{
    // =========================
    // TAMPILKAN DAFTAR
    // =========================
    public function index()
    {
        $peripherals = Periferal::all();
        return view('pages.periferal', compact('peripherals'));
    }

    // =========================
    // SIMPAN DATA BARU
    // =========================
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_perangkat'  => 'required|string|max:255',
            'jenis_perangkat' => 'required|string|max:100',
            'id_perangkat'    => 'required|string|max:50',
            'merk'            => 'nullable|string|max:100',
            'tipe'            => 'nullable|string|max:100',
            'posisi'          => 'nullable|string|max:100',
            'pengguna'        => 'nullable|string|max:100',
            'keterangan'      => 'nullable|string',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // === UPLOAD FOTO (JIKA ADA) ===
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('periferal', 'public');
        }

        Periferal::create($data);

        return redirect()->route('riwayat')
            ->with('success', 'Data periferal berhasil disimpan');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        $periferal = Periferal::findOrFail($id);
        return view('pages.editperiferal', compact('periferal'));
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $id)
    {
        $periferal = Periferal::findOrFail($id);

        $data = $request->validate([
            'nama_perangkat'  => 'required|string|max:255',
            'jenis_perangkat' => 'required|string|max:100',
            'id_perangkat'    => 'required|string|max:50',
            'merk'            => 'nullable|string|max:100',
            'tipe'            => 'nullable|string|max:100',
            'posisi'          => 'nullable|string|max:100',
            'pengguna'        => 'nullable|string|max:100',
            'keterangan'      => 'nullable|string',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // === JIKA UPLOAD FOTO BARU ===
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($periferal->foto && Storage::disk('public')->exists($periferal->foto)) {
                Storage::disk('public')->delete($periferal->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('periferal', 'public');
        }

        $periferal->update($data);

        return redirect()->route('riwayat')
            ->with('success', 'Data periferal berhasil diperbarui');
    }

    // =========================
    // DETAIL
    // =========================
    public function show($id)
    {
        $periferal = Periferal::findOrFail($id);
        return view('pages.detailperiferal', compact('periferal'));
    }

    // =========================
    // HAPUS DATA
    // =========================
    public function destroy($id)
    {
        $periferal = Periferal::findOrFail($id);

        // hapus foto dari storage
        if ($periferal->foto && Storage::disk('public')->exists($periferal->foto)) {
            Storage::disk('public')->delete($periferal->foto);
        }

        $periferal->delete();

        return redirect()->back()
            ->with('success', 'Data periferal berhasil dihapus');
    }
}
