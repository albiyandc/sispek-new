<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LayananPublik;

class LayananPublikSeeder extends Seeder
{
    public function run(): void
    {
        LayananPublik::truncate();

        LayananPublik::create([
            'nama_layanan' => 'Pembuatan Kartu Keluarga (KK)',
            'deskripsi' => 'Layanan penerbitan dokumen Kartu Keluarga baru karena perubahan data, pecah KK, atau hilang/rusak bagi warga di wilayah Kecamatan Cihideung, Kota Tasikmalaya.',
            'persyaratan' => "Surat pengantar RT/RW setempat yang sudah ditandatangani.\nFotokopi Buku Nikah atau Kutipan Akta Perkawinan (bagi yang sudah menikah).\nFotokopi Akta Kelahiran bagi seluruh anggota keluarga yang didaftarkan.\nKartu Keluarga (KK) asli (jika perubahan data atau pecah KK).\nSurat Keterangan Kehilangan dari Kepolisian (khusus untuk KK hilang).",
            'sistem_mekanisme_prosedur' => "Pengajuan Berkas|Pemohon menyerahkan kelengkapan berkas persyaratan kepada petugas di loket pelayanan Kecamatan Cihideung.\nVerifikasi & Validasi|Petugas memverifikasi kelengkapan berkas. Jika lengkap, berkas akan divalidasi dan diinput ke dalam sistem kependudukan (SIAK).\nPencetakan|Setelah disetujui secara digital (TTE), dokumen Kartu Keluarga akan dicetak menggunakan kertas HVS A4 80 gram sesuai standar nasional.\nPenyerahan|Pemohon mengambil KK yang sudah jadi atau menerima link download dokumen PDF melalui email/WhatsApp.",
            'waktu_penyelesaian' => '3–5 Hari Kerja',
            'biaya_tarif' => 'Gratis (Rp. 0)',
            'produk_pelayanan' => 'Dokumen KK (PDF/Fisik)',
            'jumlah_pelaksana' => '4 Orang Petugas Loket',
            'penanggung_jawab' => 'Kasi Pem & Pelayanan Publik',
            'pengaduan_pelayanan' => "(0265) 123456 - Ext. 102\npengaduan.cihideung@tasikmalaya.go.id\nWhatsApp: 081312226045",
            'status_layanan' => 'aktif'
        ]);

        LayananPublik::create([
            'nama_layanan' => 'Penerbitan KTP-el',
            'deskripsi' => 'Layanan pembuatan dan penggantian Kartu Tanda Penduduk Elektronik bagi warga Kecamatan Cihideung.',
            'persyaratan' => "Fotokopi Kartu Keluarga (KK).\nSurat Pengantar RT/RW.\nKTP Lama (jika perpanjangan/rusak) atau Surat Kehilangan Kepolisian.",
            'sistem_mekanisme_prosedur' => "Pengajuan Berkas|Pemohon mendatangi loket pelayanan dengan berkas lengkap.\nPerekaman Biometrik|Perekaman foto, sidik jari, dan iris mata (untuk pemohon baru).\nPencetakan & Penyerahan|Pencetakan KTP-el dan penyerahan kepada pemohon.",
            'waktu_penyelesaian' => '1–3 Hari Kerja',
            'biaya_tarif' => 'Gratis (Rp. 0)',
            'produk_pelayanan' => 'KTP-el Fisik',
            'jumlah_pelaksana' => '3 Orang Petugas Loket',
            'penanggung_jawab' => 'Kasi Pem & Pelayanan Publik',
            'pengaduan_pelayanan' => "(0265) 123456 - Ext. 102\npengaduan.cihideung@tasikmalaya.go.id\nWhatsApp: 081312226045",
            'status_layanan' => 'aktif'
        ]);

        LayananPublik::create([
            'nama_layanan' => 'Surat Keterangan Pindah Penduduk (SKPWNI)',
            'deskripsi' => 'Layanan pengurusan surat keterangan kepindahan warga antar domisili/kecamatan/kota.',
            'persyaratan' => "Kartu Keluarga (KK) asli.\nKTP-el asli pemohon.\nFormulir permohonan pindah yang diisi lengkap.",
            'sistem_mekanisme_prosedur' => "Verifikasi Berkas|Pemeriksaan berkas dan data kepindahan.\nEntry Data|Input data surat pindah pada aplikasi SIAK.\nPenerbitan SKPWNI|Penerbitan dokumen Surat Keterangan Pindah.",
            'waktu_penyelesaian' => '1–2 Hari Kerja',
            'biaya_tarif' => 'Gratis (Rp. 0)',
            'produk_pelayanan' => 'Surat Keterangan Pindah (SKPWNI)',
            'jumlah_pelaksana' => '2 Orang Petugas Loket',
            'penanggung_jawab' => 'Kasi Pem & Pelayanan Publik',
            'pengaduan_pelayanan' => "(0265) 123456 - Ext. 102\npengaduan.cihideung@tasikmalaya.go.id\nWhatsApp: 081312226045",
            'status_layanan' => 'aktif'
        ]);

        LayananPublik::create([
            'nama_layanan' => 'Surat Keterangan Tidak Mampu (SKTM)',
            'deskripsi' => 'Layanan penerbitan surat keterangan tidak mampu untuk keperluan pendidikan, kesehatan, atau bantuan sosial.',
            'persyaratan' => "Surat Pengantar RT/RW setempat.\nFotokopi Kartu Keluarga (KK) dan KTP-el.\nSurat Pernyataan Tidak Mampu bermaterai.",
            'sistem_mekanisme_prosedur' => "Pengajuan Berkas|Penyerahan kelengkapan berkas di loket.\nVerifikasi Lapangan|Verifikasi status tidak mampu oleh petugas.\nPenandatanganan & Legalisasi|Pengesahan surat oleh Camat/Kasi.",
            'waktu_penyelesaian' => '1 Hari Kerja',
            'biaya_tarif' => 'Gratis (Rp. 0)',
            'produk_pelayanan' => 'Surat Keterangan Tidak Mampu (SKTM)',
            'jumlah_pelaksana' => '2 Orang Petugas Loket',
            'penanggung_jawab' => 'Kasi Kesejahteraan Rakyat',
            'pengaduan_pelayanan' => "(0265) 123456 - Ext. 102\npengaduan.cihideung@tasikmalaya.go.id\nWhatsApp: 081312226045",
            'status_layanan' => 'aktif'
        ]);

        LayananPublik::create([
            'nama_layanan' => 'Rekomendasi Izin Usaha Mikro dan Kecil (IUMK)',
            'deskripsi' => 'Layanan penerbitan rekomendasi izin usaha skala mikro dan kecil bagi pelaku usaha setempat.',
            'persyaratan' => "Surat Pengantar RT/RW lokasi usaha.\nFotokopi KTP-el dan KK.\nFoto lokasi tempat usaha (ukuran 4x6 2 lembar).",
            'sistem_mekanisme_prosedur' => "Pengajuan Berkas|Penyerahan berkas permohonan rekomendasi.\nTinjauan Berkas|Pemeriksaan kesesuaian lokasi dan jenis usaha.\nPenerbitan Rekomendasi|Penandatanganan dokumen rekomendasi IUMK.",
            'waktu_penyelesaian' => '2 Hari Kerja',
            'biaya_tarif' => 'Gratis (Rp. 0)',
            'produk_pelayanan' => 'Dokumen Rekomendasi IUMK',
            'jumlah_pelaksana' => '2 Orang Petugas Loket',
            'penanggung_jawab' => 'Kasi Ekonomi dan Pembangunan',
            'pengaduan_pelayanan' => "(0265) 123456 - Ext. 102\npengaduan.cihideung@tasikmalaya.go.id\nWhatsApp: 081312226045",
            'status_layanan' => 'aktif'
        ]);

        LayananPublik::create([
            'nama_layanan' => 'Legalisasi Dokumen Kependudukan',
            'deskripsi' => 'Layanan pengesahan/legalisasi salinan dokumen kependudukan seperti KK, Akta Kelahiran, dan SKTM.',
            'persyaratan' => "Dokumen asli yang akan dilegalisasi.\nFotokopi dokumen maksimal 5 lembar per permohonan.",
            'sistem_mekanisme_prosedur' => "Pemeriksaan Dokumen|Pencocokan dokumen fotokopi dengan dokumen asli.\nPembubuhan Stempel & Tanda Tangan|Penandatanganan oleh pejabat berwenang.",
            'waktu_penyelesaian' => '15–30 Menit',
            'biaya_tarif' => 'Gratis (Rp. 0)',
            'produk_pelayanan' => 'Dokumen Legalisasi Cap Stempel Basah/Digital',
            'jumlah_pelaksana' => '2 Orang Petugas Loket',
            'penanggung_jawab' => 'Kasi Pem & Pelayanan Publik',
            'pengaduan_pelayanan' => "(0265) 123456 - Ext. 102\npengaduan.cihideung@tasikmalaya.go.id\nWhatsApp: 081312226045",
            'status_layanan' => 'aktif'
        ]);
    }
}
