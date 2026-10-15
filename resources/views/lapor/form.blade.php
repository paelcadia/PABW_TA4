@extends('layouts.app')

@section('title', 'Form Laporan Banjir')

@section('content')

    <h2>Form Laporan Banjir</h2>

    <div class="card">

        <form action="{{ route('lapor.store') }}" method="POST">

            @csrf

            <label for="nama_pelapor">Nama Pelapor</label>
            <input
                type="text"
                id="nama_pelapor"
                name="nama_pelapor"
                placeholder="Masukkan nama pelapor"
                value="{{ old('nama_pelapor') }}"
                required
            >

            <label for="lokasi">Lokasi Kejadian</label>
            <input
                type="text"
                id="lokasi"
                name="lokasi"
                placeholder="Masukkan lokasi kejadian"
                value="{{ old('lokasi') }}"
                required
            >

            <label for="tinggi_genangan">Tinggi Genangan Air (cm)</label>
            <input
                type="number"
                id="tinggi_genangan"
                name="tinggi_genangan"
                placeholder="Masukkan tinggi genangan"
                min="0"
                value="{{ old('tinggi_genangan') }}"
                required
            >

            <label for="tanggal_kejadian">Tanggal Kejadian</label>
            <input
                type="date"
                id="tanggal_kejadian"
                name="tanggal_kejadian"
                max="{{ now()->toDateString() }}"
                value="{{ old('tanggal_kejadian') }}"
                required
            >

            <button type="submit">
                Kirim Laporan
            </button>

        </form>

    </div>

@endsection