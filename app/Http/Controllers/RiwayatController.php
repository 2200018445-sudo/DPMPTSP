<?php

namespace App\Http\Controllers;

use App\Models\Periferal;
use App\Models\PerangkatUtama;
use App\Models\RequestPemeliharaan;

class RiwayatController extends Controller
{
    public function index()
{
    $periferals = Periferal::latest()->get();
    $perangkatUtamas = PerangkatUtama::latest()->get();
    $requestPemeliharaans = RequestPemeliharaan::latest()->get();

    return view('pages.riwayat', compact(
        'periferals',
        'perangkatUtamas',
        'requestPemeliharaans'
    ));
}}