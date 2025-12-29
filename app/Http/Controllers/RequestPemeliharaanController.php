<?php

namespace App\Http\Controllers;

use App\Models\RequestPemeliharaan;
use Illuminate\Http\Request;

class RequestPemeliharaanController extends Controller
{
    
    
public function index()
{
    $requestPemeliharaans = RequestPemeliharaan::all();
    return view('pages.requestpemeliharaan', compact('requestPemeliharaans'));
}


    public function create()
    {
        return view('pages.requestpemeliharaan');
    }

    public function store(Request $request)
{
    $request->validate([
        'tanggal_aduan'        => 'required|date',
        'kerusakan'            => 'required|string',
        'user_aduan'           => 'required|string',
        'tanggal_penanganan'   => 'nullable|date',
        'nama_penanganan'      => 'nullable|string',
        'tindakan'             => 'nullable|string',
        'status'               => 'required|string',
    ]);

    RequestPemeliharaan::create([
        'tanggal_aduan'        => $request->tanggal_aduan,
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
    return view('pages.editpemeliharaan', compact('requestPemeliharaan'));
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


}