<div class="card">

    <h3>{{ $laporan->nama_pelapor }}</h3>

    <p>
        <strong>Lokasi:</strong>
        {{ $laporan->lokasi }}
    </p>

    <p>
        <strong>Tinggi Genangan:</strong>
        {{ $laporan->tinggi_genangan }} cm
    </p>

    <p>
        <strong>Tanggal Kejadian:</strong>
        {{ $laporan->tanggal_kejadian->format('d-m-Y') }}
    </p>

    <p>
        <strong>Status:</strong>

        @if($laporan->tinggi_genangan < 30)
            <span class="status">Waspada</span>
        @elseif($laporan->tinggi_genangan <= 70)
            <span class="status">Siaga</span>
        @else
            <span class="status">Awas</span>
        @endif

    </p>

</div>