<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\LayananPublik;

class FrontController extends Controller
{
    private function getDummyServices()
    {
        return [
            ['id' => 1, 'kecamatan' => 'Kecamatan Cihideung', 'kategori' => 'UMUM', 'kategori_slug' => 'umum', 'judul' => 'Pelayanan Surat Keterangan Domisili', 'deskripsi' => 'Pengajuan dokumen keterangan tempat tinggal untuk keperluan administrasi perbankan dan pekerjaan.', 'icon' => 'location_city', 'bg_color' => 'bg-blue-50', 'text_color' => 'text-blue-800'],
            ['id' => 2, 'kecamatan' => 'Kecamatan Cipedes', 'kategori' => 'PAJAK', 'kategori_slug' => 'pajak', 'judul' => 'Pendaftaran Objek Pajak Baru', 'deskripsi' => 'Pendaftaran SPPT PBB-P2 untuk bangunan atau tanah baru yang belum terdata di basis data pajak.', 'icon' => 'payments', 'bg_color' => 'bg-green-50', 'text_color' => 'text-green-800'],
            ['id' => 3, 'kecamatan' => 'Kecamatan Tawang', 'kategori' => 'KEPENDUDUKAN', 'kategori_slug' => 'kependudukan', 'judul' => 'Surat Pengantar KTP-el', 'deskripsi' => 'Pengurusan surat pengantar untuk perekaman atau pencetakan ulang KTP elektronik bagi warga baru 17 tahun.', 'icon' => 'badge', 'bg_color' => 'bg-yellow-50', 'text_color' => 'text-yellow-800'],
            ['id' => 4, 'kecamatan' => 'Kecamatan Indihiang', 'kategori' => 'PERIZINAN', 'kategori_slug' => 'perizinan', 'judul' => 'Izin Usaha Mikro Kecil (IUMK)', 'deskripsi' => 'Legalitas usaha bagi pelaku UMKM di wilayah Indihiang untuk mempermudah akses permodalan KUR.', 'icon' => 'storefront', 'bg_color' => 'bg-blue-50', 'text_color' => 'text-blue-800'],
            ['id' => 5, 'kecamatan' => 'Kecamatan Kawalu', 'kategori' => 'KEPENDUDUKAN', 'kategori_slug' => 'kependudukan', 'judul' => 'Perubahan Data Kartu Keluarga', 'deskripsi' => 'Penambahan anggota keluarga baru atau pembaharuan status pendidikan di dokumen KK.', 'icon' => 'family_restroom', 'bg_color' => 'bg-green-50', 'text_color' => 'text-green-800'],
            ['id' => 6, 'kecamatan' => 'Kecamatan Cibeureum', 'kategori' => 'SOSIAL', 'kategori_slug' => 'sosial', 'judul' => 'Surat Keterangan Tidak Mampu (SKTM)', 'deskripsi' => 'Penerbitan surat keterangan untuk persyaratan beasiswa pendidikan atau keringanan biaya kesehatan.', 'icon' => 'volunteer_activism', 'bg_color' => 'bg-yellow-50', 'text_color' => 'text-yellow-800'],
            ['id' => 7, 'kecamatan' => 'Kecamatan Mangkubumi', 'kategori' => 'TANAH', 'kategori_slug' => 'tanah', 'judul' => 'Rekomendasi Pemecahan Sertifikat', 'deskripsi' => 'Surat rekomendasi dari kecamatan untuk proses pemecahan sertifikat tanah di kantor BPN.', 'icon' => 'real_estate_agent', 'bg_color' => 'bg-blue-50', 'text_color' => 'text-blue-800'],
            ['id' => 8, 'kecamatan' => 'Kecamatan Purbaratu', 'kategori' => 'ARSIP', 'kategori_slug' => 'arsip', 'judul' => 'Legalisir Dokumen Administrasi', 'deskripsi' => 'Pengesahan salinan dokumen kependudukan atau surat keterangan lainnya dengan cap resmi kecamatan.', 'icon' => 'history_edu', 'bg_color' => 'bg-green-50', 'text_color' => 'text-green-800'],
            ['id' => 9, 'kecamatan' => 'Kecamatan Bungursari', 'kategori' => 'UMUM', 'kategori_slug' => 'umum', 'judul' => 'Surat Izin Keramaian Lingkungan', 'deskripsi' => 'Pengajuan izin pelaksanaan acara sosial kemasyarakatan di lingkungan pemukiman warga.', 'icon' => 'work', 'bg_color' => 'bg-yellow-50', 'text_color' => 'text-yellow-800'],
            ['id' => 10, 'kecamatan' => 'Kecamatan Tamansari', 'kategori' => 'KEPENDUDUKAN', 'kategori_slug' => 'kependudukan', 'judul' => 'Pelayanan Akta Kelahiran', 'deskripsi' => 'Pengurusan rekomendasi pencatatan kelahiran baru untuk penerbitan kutipan Akta Kelahiran.', 'icon' => 'child_care', 'bg_color' => 'bg-blue-50', 'text_color' => 'text-blue-800'],
            ['id' => 11, 'kecamatan' => 'Kecamatan Cihideung', 'kategori' => 'UMUM', 'kategori_slug' => 'umum', 'judul' => 'Surat Pengantar Nikah', 'deskripsi' => 'Pengurusan surat pengantar nikah (N1-N4) sebagai syarat pendaftaran di KUA.', 'icon' => 'favorite', 'bg_color' => 'bg-green-50', 'text_color' => 'text-green-800'],
            ['id' => 12, 'kecamatan' => 'Kecamatan Cipedes', 'kategori' => 'KESEHATAN', 'kategori_slug' => 'kesehatan', 'judul' => 'Surat Keterangan Sehat', 'deskripsi' => 'Penerbitan surat keterangan sehat dari puskesmas tingkat kecamatan.', 'icon' => 'health_and_safety', 'bg_color' => 'bg-blue-50', 'text_color' => 'text-blue-800'],
            ['id' => 13, 'kecamatan' => 'Kecamatan Tawang', 'kategori' => 'PENDIDIKAN', 'kategori_slug' => 'pendidikan', 'judul' => 'Rekomendasi Mutasi Siswa', 'deskripsi' => 'Surat rekomendasi dari kecamatan untuk perpindahan siswa antar sekolah.', 'icon' => 'school', 'bg_color' => 'bg-yellow-50', 'text_color' => 'text-yellow-800'],
            ['id' => 14, 'kecamatan' => 'Kecamatan Kawalu', 'kategori' => 'USAHA', 'kategori_slug' => 'usaha', 'judul' => 'Surat Keterangan Usaha (SKU)', 'deskripsi' => 'Bukti legalitas keberadaan tempat usaha atau wirausaha di wilayah setempat.', 'icon' => 'business', 'bg_color' => 'bg-blue-50', 'text_color' => 'text-blue-800'],
            ['id' => 15, 'kecamatan' => 'Kecamatan Mangkubumi', 'kategori' => 'LINGKUNGAN', 'kategori_slug' => 'lingkungan', 'judul' => 'Izin Penebangan Pohon', 'deskripsi' => 'Pengajuan izin untuk penebangan pohon yang berisiko mengganggu fasilitas umum.', 'icon' => 'park', 'bg_color' => 'bg-green-50', 'text_color' => 'text-green-800'],
        ];
    }

    private function getGlobalClicks()
    {
        $dbClicks = [];
        try {
            $dbClicks = LayananPublik::pluck('jumlah_klik', 'id_layanan')->toArray();
        } catch (\Throwable $e) {}

        return $dbClicks;
    }

    public function index()
    {
        $kecamatans = [
            'Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 
            'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu'
        ];

        $services = $this->getDummyServices();
        $dbClicks = $this->getGlobalClicks();
        $sessionClicks = session()->get('service_clicks', []);
        
        foreach ($services as &$service) {
            $id = $service['id'];
            $service['clicks'] = ($dbClicks[$id] ?? 0) + ($sessionClicks[$id] ?? 0) + Cache::get("service_clicks_{$id}", 0);
        }

        usort($services, function($a, $b) {
            return $b['clicks'] <=> $a['clicks'];
        });
        
        return view('home', compact('kecamatans', 'services'));
    }

    public function semuaLayanan(Request $request)
    {
        $services = $this->getDummyServices();
        $dbClicks = $this->getGlobalClicks();
        $sessionClicks = session()->get('service_clicks', []);
        $query = $request->input('q');

        if ($query) {
            $queryLower = strtolower($query);
            $services = array_filter($services, function ($service) use ($queryLower) {
                return str_contains(strtolower($service['judul']), $queryLower) || 
                       str_contains(strtolower($service['deskripsi']), $queryLower) ||
                       str_contains(strtolower($service['kategori']), $queryLower) ||
                       str_contains(strtolower($service['kecamatan']), $queryLower);
            });
        }

        foreach ($services as &$service) {
            $id = $service['id'];
            $service['clicks'] = ($dbClicks[$id] ?? 0) + ($sessionClicks[$id] ?? 0) + Cache::get("service_clicks_{$id}", 0);
        }

        usort($services, function($a, $b) {
            return $b['clicks'] <=> $a['clicks'];
        });

        return view('semua_layanan', compact('services', 'query'));
    }

    public function kecamatan(Request $request, $nama_kecamatan)
    {
        $serviceId = $request->input('service_id');
        if ($serviceId) {
            return redirect()->route('layanan.detail', ['id' => $serviceId]);
        }

        $dummyServices = $this->getDummyServices();
        $dummy = collect($dummyServices)->first(function ($s) use ($nama_kecamatan) {
            return str_contains(strtolower($s['kecamatan']), strtolower($nama_kecamatan));
        }) ?? $dummyServices[0];

        return redirect()->route('layanan.detail', ['id' => $dummy['id']]);
    }

    public function detailLayanan($id)
    {
        $dummyServices = $this->getDummyServices();
        $dummy = collect($dummyServices)->firstWhere('id', (int)$id);

        if ($dummy) {
            $layanan = (object)[
                'id' => $dummy['id'],
                'nama_layanan' => $dummy['judul'],
                'produk_pelayanan' => $dummy['deskripsi'],
                'persyaratan' => "Surat pengantar RT/RW setempat.\nFotokopi KTP dan KK.\nDokumen pendukung lainnya yang relevan.",
                'waktu_penyelesaian' => "1-3 Hari Kerja",
                'biaya' => "Gratis",
                'prosedur' => "Pemohon datang membawa berkas.\nPetugas memverifikasi kelengkapan berkas.\nDokumen diproses oleh petugas kecamatan.\nPenyerahan dokumen kepada pemohon.",
                'nama_kecamatan' => $dummy['kecamatan']
            ];
            return view('detail_layanan', compact('layanan'));
        }

        $layanan = LayananPublik::findOrFail($id);
        return view('detail_layanan', compact('layanan'));
    }

    public function kategori(Request $request, $kategori)
    {
        $mappingKategori = [
            'umum' => ['Cihideung', 'Bungursari'],
            'pajak' => ['Cipedes'],
            'kependudukan' => ['Tawang', 'Kawalu', 'Tamansari'],
            'perizinan' => ['Indihiang'],
            'sosial' => ['Cibeureum'],
            'tanah' => ['Mangkubumi'],
            'arsip' => ['Purbaratu'],
        ];

        $kategoriLower = strtolower($kategori);
        $kecamatans = $mappingKategori[$kategoriLower] ?? [];
        
        $namaLayanan = null;
        $serviceId = $request->input('service_id');
        if ($serviceId) {
            $dummyServices = $this->getDummyServices();
            $dummy = collect($dummyServices)->firstWhere('id', (int)$serviceId);
            if ($dummy) {
                $namaLayanan = $dummy['judul'];
            }
        }

        $namaLayanan = $namaLayanan ?? strtoupper($kategori);

        return view('kategori', compact('kecamatans', 'namaLayanan', 'serviceId'));
    }

    public function trackKategori($id, $kategori)
    {
        try {
            LayananPublik::where('id_layanan', $id)->increment('jumlah_klik');
        } catch (\Throwable $e) {}

        Cache::increment("service_clicks_{$id}");

        $clicks = session()->get('service_clicks', []);
        $clicks[$id] = ($clicks[$id] ?? 0) + 1;
        session()->put('service_clicks', $clicks);

        // Redirect ke pilihan kecamatan berdasarkan nama layanan / kategori
        return redirect()->route('kategori.show', ['kategori' => $kategori, 'service_id' => $id]);
    }

    public function trackClickApi($id)
    {
        try {
            LayananPublik::where('id_layanan', $id)->increment('jumlah_klik');
        } catch (\Throwable $e) {}

        $newClicks = Cache::increment("service_clicks_{$id}");

        $clicks = session()->get('service_clicks', []);
        $clicks[$id] = ($clicks[$id] ?? 0) + 1;
        session()->put('service_clicks', $clicks);

        return response()->json(['success' => true, 'clicks' => $newClicks]);
    }
}