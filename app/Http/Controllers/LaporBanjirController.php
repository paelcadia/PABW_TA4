<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    public function form()
    {
        return view('lapor.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tinggi_genangan' => 'required|integer|min:0',
            'tanggal_kejadian' => 'required|date|before_or_equal:today',
        ]);

        $laporan = Laporan::create($data);

        return redirect()
            ->route('lapor.konfirmasi')
            ->with('laporan', $laporan);
    }

    public function konfirmasi()
    {
        $laporan = session('laporan');

        return view('lapor.konfirmasi', compact('laporan'));
    }

    public function daftar()
    {
        $laporan = Laporan::all();

        return view('lapor.daftar', compact('laporan'));
    }
}
