<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class PelayananPublikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = base_path('dummy_pelayanan_publik.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("File dummy_pelayanan_publik.json tidak ditemukan di {$jsonPath}");
            return;
        }

        $jsonContent = File::get($jsonPath);
        $data = json_decode($jsonContent, true);

        if (!isset($data['data']) || !is_array($data['data'])) {
            $this->command->error("Format JSON tidak valid atau data kosong.");
            return;
        }

        Schema::disableForeignKeyConstraints();
        DB::table('layanan_publik')->truncate();
        DB::table('kecamatans')->truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($data['data'] as $item) {
            $kecamatanData = $item['kecamatan'] ?? [];

            if (empty($kecamatanData)) {
                continue;
            }

            // Insert Kecamatan
            DB::table('kecamatans')->insert([
                'id' => $kecamatanData['id'] ?? null,
                'nama_kecamatan' => $kecamatanData['nama_kecamatan'] ?? '',
                'subdomain' => $kecamatanData['subdomain'] ?? null,
                'maklumat_isi' => $kecamatanData['maklumat_pelayanan']['isi'] ?? null,
                'maklumat_penandatangan' => $kecamatanData['maklumat_pelayanan']['penandatangan'] ?? null,
                'ikm_nilai' => $kecamatanData['ikm']['nilai'] ?? null,
                'ikm_kategori' => $kecamatanData['ikm']['kategori'] ?? null,
                'ikm_tahun' => $kecamatanData['ikm']['tahun'] ?? null,
                'ikm_responden' => $kecamatanData['ikm']['responden'] ?? null,
                'ikm_periode' => $kecamatanData['ikm']['periode'] ?? null,
                'jam_kerja' => $kecamatanData['profil_penyelenggara']['jam_kerja'] ?? null,
                'jumlah_pelaksana' => $kecamatanData['profil_penyelenggara']['jumlah_pelaksana'] ?? null,
                'penanggung_jawab' => $kecamatanData['profil_penyelenggara']['penanggung_jawab'] ?? null,
                'kualifikasi_pelaksana' => $kecamatanData['profil_penyelenggara']['kualifikasi_pelaksana'] ?? null,
                'alamat' => $kecamatanData['profil_penyelenggara']['alamat'] ?? null,
                'telepon' => $kecamatanData['profil_penyelenggara']['telepon'] ?? null,
                'email' => $kecamatanData['profil_penyelenggara']['email'] ?? null,
                'mekanisme_pengaduan_global' => $kecamatanData['mekanisme_pengaduan_global'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert Daftar Layanan
            $daftarLayanan = $item['daftar_layanan'] ?? [];
            foreach ($daftarLayanan as $layanan) {
                $standar = $layanan['standar_pelayanan'] ?? [];

                // Persyaratan: urutkan & format sebagai text per baris
                $persyaratanText = '';
                if (isset($standar['persyaratan']) && is_array($standar['persyaratan'])) {
                    $persyaratanText = collect($standar['persyaratan'])
                        ->sortBy('urutan')
                        ->pluck('isi')
                        ->implode("\n");
                }

                // Prosedur: urutkan & format sebagai text per baris
                $prosedurText = '';
                if (isset($standar['prosedur']) && is_array($standar['prosedur'])) {
                    $prosedurText = collect($standar['prosedur'])
                        ->sortBy('urutan')
                        ->pluck('isi')
                        ->implode("\n");
                }

                // Pengaduan channels dalam format JSON string
                $pengaduanChannelsJson = null;
                if (isset($standar['pengaduan_channels']) && is_array($standar['pengaduan_channels'])) {
                    $pengaduanChannelsJson = json_encode($standar['pengaduan_channels']);
                }

                DB::table('layanan_publik')->insert([
                    'simat_layanan_id' => $layanan['simat_layanan_id'] ?? null,
                    'kecamatan_id' => $kecamatanData['id'] ?? null,
                    'nama_layanan' => $layanan['nama_layanan'] ?? '',
                    'slug' => $layanan['slug'] ?? null,
                    'persyaratan' => $persyaratanText ?: null,
                    'sistem_mekanisme_prosedur' => $prosedurText ?: null,
                    'waktu_penyelesaian' => $standar['waktu_penyelesaian'] ?? null,
                    'biaya_tarif' => $standar['biaya_tarif'] ?? null,
                    'produk_pelayanan' => $standar['produk_pelayanan'] ?? null,
                    'jumlah_pelaksana_teknis' => $standar['jumlah_pelaksana_teknis'] ?? null,
                    'penanggung_jawab_teknis' => $standar['penanggung_jawab_teknis'] ?? null,
                    'kualifikasi_pelaksana' => $standar['kualifikasi_pelaksana'] ?? null,
                    'pengaduan_langsung' => $standar['pengaduan_langsung'] ?? null,
                    'mekanisme_pengaduan_tindak_lanjut' => $standar['mekanisme_pengaduan_tindak_lanjut'] ?? null,
                    'pengaduan_channels' => $pengaduanChannelsJson,
                    'pengaduan_pelayanan' => $standar['pengaduan_langsung'] ?? null,
                    'status_layanan' => 'aktif',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Data pelayanan publik berhasil di-seed dari dummy_pelayanan_publik.json!');
    }
}
