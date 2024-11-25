<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    // Menampilkan daftar jadwal dokter
    public function index()
    {
        $jadwal_dokter = JadwalDokter::all(); 
        return view('dashboard.jadwal.index', compact('jadwal_dokter'));
        return view('dashboard.jadwal.index', ['jadwal_dokter' => $jadwal_dokter]);
    }

}
