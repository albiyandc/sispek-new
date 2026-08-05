<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sektor;
use App\Models\MasterLayanan;
use App\Models\Instansi;
use App\Models\LayananInstansi;
use Illuminate\Support\Facades\File;

class SispekV2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = base_path('dummy_pelayanan_publik_v2.json');
        if (!File::exists($jsonPath)) {
            return;
        }

        $json = json_decode(File::get($jsonPath), true);
        if (!$json) {
            return;
        }

        // 1. Seed Sektor List dari metadata
        $sektorList = $json['metadata']['sektor_list'] ?? [];
        foreach ($sektorList as $s) {
            Sektor::updateOrCreate(
                ['id' => $s['id']],
                [
                    'nama_sektor' => $s['nama_sektor'],
                    'slug' => $s['slug']
                ]
            );
        }

        // 2. Seed Instansi & Layanan Instansi
        $dataList = $json['data'] ?? [];
        foreach ($dataList as $item) {
            $instData = $item['instansi'] ?? [];
            $instansi = Instansi::updateOrCreate(
                ['id' => $instData['id']],
                [
                    'kode_instansi' => $instData['kode_instansi'],
                    'nama_instansi' => $instData['nama_instansi'],
                    'jenis' => $instData['jenis'] ?? 'kecamatan',
                    'subdomain' => $instData['subdomain'] ?? null,
                    'maklumat_isi' => $instData['maklumat_pelayanan']['isi'] ?? null,
                    'maklumat_penandatangan' => $instData['maklumat_pelayanan']['penandatangan'] ?? null,
                    'ikm_nilai' => $instData['ikm']['nilai'] ?? null,
                    'ikm_kategori' => $instData['ikm']['kategori'] ?? null,
                    'ikm_tahun' => $instData['ikm']['tahun'] ?? null,
                    'ikm_responden' => $instData['ikm']['responden'] ?? null,
                    'ikm_periode' => $instData['ikm']['periode'] ?? null,
                    'jam_kerja' => $instData['profil_penyelenggara']['jam_kerja'] ?? null,
                    'jumlah_pelaksana' => $instData['profil_penyelenggara']['jumlah_pelaksana'] ?? null,
                    'penanggung_jawab' => $instData['profil_penyelenggara']['penanggung_jawab'] ?? null,
                    'kualifikasi_pelaksana' => $instData['profil_penyelenggara']['kualifikasi_pelaksana'] ?? null,
                    'alamat' => $instData['profil_penyelenggara']['alamat'] ?? null,
                    'telepon' => $instData['profil_penyelenggara']['telepon'] ?? null,
                    'email' => $instData['profil_penyelenggara']['email'] ?? null,
                    'mekanisme_pengaduan_global' => $instData['mekanisme_pengaduan_global'] ?? null,
                ]
            );

            $daftarLayanan = $item['daftar_layanan'] ?? [];
            foreach ($daftarLayanan as $lay) {
                $master = $lay['layanan_master'] ?? [];
                $sektorObj = $master['sektor'] ?? [];

                if (!empty($sektorObj)) {
                    Sektor::updateOrCreate(
                        ['id' => $sektorObj['id']],
                        [
                            'nama_sektor' => $sektorObj['nama_sektor'],
                            'slug' => $sektorObj['slug']
                        ]
                    );
                }

                $masterLayanan = MasterLayanan::updateOrCreate(
                    ['id' => $master['id']],
                    [
                        'sektor_id' => $sektorObj['id'] ?? 1,
                        'nama_layanan' => $master['nama_layanan'],
                        'slug' => $master['slug'],
                        'persyaratan_umum' => $master['persyaratan_umum'] ?? []
                    ]
                );

                $sp = $lay['standar_pelayanan'] ?? [];
                $at = $lay['audit_trail'] ?? [];

                LayananInstansi::updateOrCreate(
                    ['id' => $lay['layanan_instansi_id']],
                    [
                        'instansi_id' => $instansi->id,
                        'master_layanan_id' => $masterLayanan->id,
                        'external_id' => $lay['external_id'] ?? null,
                        'status_approval' => $lay['status_approval'] ?? 'disetujui',
                        'status_layanan' => $lay['status_layanan'] ?? 'aktif',
                        'view_count' => $lay['view_count'] ?? 0,
                        'catatan_revisi' => $lay['catatan_revisi'] ?? null,
                        'waktu_penyelesaian' => $sp['waktu_penyelesaian'] ?? null,
                        'biaya_tarif' => $sp['biaya_tarif'] ?? null,
                        'produk_pelayanan' => $sp['produk_pelayanan'] ?? null,
                        'persyaratan_khusus' => $sp['persyaratan_khusus'] ?? [],
                        'prosedur' => $sp['prosedur'] ?? [],
                        'pengaduan_channels' => $sp['pengaduan_channels'] ?? [],
                        'created_by' => $at['created_by'] ?? null,
                        'approved_by' => $at['approved_by'] ?? null,
                    ]
                );
            }
        }
    }
}
