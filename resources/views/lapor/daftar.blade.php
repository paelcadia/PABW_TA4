@extends('layouts.app')

@section('title', 'Daftar Laporan Banjir')

@section('content')

    <h2>Daftar Laporan Banjir</h2>

    @forelse($laporan as $data)

        @include('partials.laporan-card', [
            'laporan' => $data
        ])

    @empty

        <div class="card">
            <p>Belum ada laporan banjir.</p>
        </div>

    @endforelse

@endsection