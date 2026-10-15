<?php

namespace Tests\Feature;

use App\Models\Laporan;
use Database\Seeders\LaporanSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaporanTest extends TestCase
{
    use RefreshDatabase;

    public function test_laporan_from_form_is_saved_and_shown_on_confirmation(): void
    {
        $data = [
            'nama_pelapor' => 'Siti Rahma',
            'lokasi' => 'Dayeuhkolot',
            'tinggi_genangan' => 45,
            'tanggal_kejadian' => now()->toDateString(),
        ];

        $response = $this->post(route('lapor.store'), $data);

        $response->assertRedirect(route('lapor.konfirmasi'));
        $this->assertDatabaseHas('laporan', [
            'nama_pelapor' => $data['nama_pelapor'],
            'lokasi' => $data['lokasi'],
            'tinggi_genangan' => $data['tinggi_genangan'],
        ]);
        $this->assertSame(
            $data['tanggal_kejadian'],
            Laporan::query()->firstOrFail()->tanggal_kejadian->toDateString()
        );
        $this->get(route('lapor.konfirmasi'))
            ->assertOk()
            ->assertSee('Laporan banjir berhasil dikirim.')
            ->assertSee('Siti Rahma')
            ->assertSee('45 cm');
    }

    public function test_laporan_page_displays_database_reports_and_flood_statuses(): void
    {
        foreach ([20, 50, 100] as $height) {
            Laporan::create([
                'nama_pelapor' => "Pelapor {$height}",
                'lokasi' => 'Baleendah',
                'tinggi_genangan' => $height,
                'tanggal_kejadian' => now()->toDateString(),
            ]);
        }

        $this->get(route('lapor.daftar'))
            ->assertOk()
            ->assertSee('Pelapor 20')
            ->assertSee('Pelapor 50')
            ->assertSee('Pelapor 100')
            ->assertSee('Waspada')
            ->assertSee('Siaga')
            ->assertSee('Awas');
    }

    public function test_laporan_seeder_creates_at_least_fifteen_recent_reports(): void
    {
        $this->seed(LaporanSeeder::class);

        $this->assertSame(15, Laporan::count());
        $this->assertFalse(
            Laporan::query()
                ->whereDate('tanggal_kejadian', '<', now()->subMonth()->toDateString())
                ->exists()
        );
        $this->assertFalse(
            Laporan::query()
                ->whereDate('tanggal_kejadian', '>', now()->toDateString())
                ->exists()
        );
    }
}
