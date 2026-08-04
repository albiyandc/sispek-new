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
    }
}
