@extends('layouts.app')

@section('content')
<!-- Background utama putih pudar / abu-abu terang -->
<div class="bg-[#fcfdfd] min-h-screen pb-20 pt-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-[10px] sm:text-xs text-gray-500 mb-6 flex items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="#" class="hover:text-blue-600 transition">Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            <a href="#" class="hover:text-blue-600 transition">Cihideung</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-gray-800">{{ $layanan->nama_layanan ?? 'Pembuatan Kartu Keluarga (KK)' }}</span>
        </div>

        <!-- Header Judul Layanan -->
        <div class="flex items-start gap-4 mb-8">
            <div class="bg-[#eef2ff] text-[#0b53c8] w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center shrink-0 shadow-sm">
                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900 tracking-tight">
                    {{ $layanan->nama_layanan ?? 'Pembuatan Kartu Keluarga (KK)' }}
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 mt-1.5 leading-relaxed">
                    {{ $layanan->produk_pelayanan ?? 'Layanan penerbitan dokumen Kartu Keluarga baru karena perubahan data, pecah KK, atau hilang/rusak bagi warga di wilayah Kecamatan Cihideung, Kota Tasikmalaya.' }}
                </p>
            </div>
        </div>

        <!-- 1. Kotak Persyaratan Layanan -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 border-t-4 border-t-[#0b53c8] p-6 sm:p-8 mb-8">
            <div class="flex items-center gap-2.5 mb-5">
                <svg class="w-5 h-5 text-[#0b53c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                <h2 class="font-bold text-gray-900 text-base sm:text-lg">Persyaratan Layanan</h2>
            </div>

            <!-- List persyaratan dengan centang hijau -->
            <div class="space-y-3.5 text-xs sm:text-sm text-gray-700">
                @php
                    // Memecah baris persyaratan dari database atau menggunakan default jika kosong
                    $persyaratanList = isset($layanan->persyaratan) ? explode("\n", $layanan->persyaratan) : [
                        'Surat pengantar RT/RW setempat yang sudah ditandatangani.',
                        'Fotokopi Buku Nikah atau Kutipan Akta Perkawinan (bagi yang sudah menikah).',
                        'Fotokopi Akta Kelahiran bagi seluruh anggota keluarga yang didaftarkan.',
                        'Kartu Keluarga (KK) asli (jika perubahan data atau pecah KK).',
                        'Surat Keterangan Kehilangan dari Kepolisian (khusus untuk KK hilang).'
                    ];
                @endphp

                @foreach($persyaratanList as $item)
                    @if(trim($item) != '')
                    <div class="flex items-start gap-3">
                        <!-- Icon Centang Hijau dalam Lingkaran -->
                        <div class="bg-emerald-50 text-emerald-600 rounded-full p-0.5 shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="leading-relaxed">{{ trim($item) }}</span>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- 2. Informasi Layanan (Grid 4 Kolom) -->
        <div class="mb-8">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-[#0b53c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="font-bold text-gray-900 text-base sm:text-lg">Informasi Layanan</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Waktu Pelayanan -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div class="text-blue-600 mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Waktu Pelayanan</div>
                        <div class="font-bold text-gray-900 text-sm sm:text-base">{{ $layanan->waktu_penyelesaian ?? '3–5 Hari Kerja' }}</div>
                    </div>
                </div>

                <!-- Biaya / Tarif -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div class="text-emerald-600 mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Biaya / Tarif</div>
                        <div class="font-bold text-emerald-600 text-sm sm:text-base">{{ $layanan->biaya_tarif ?? 'Gratis (Rp. 0)' }}</div>
                    </div>
                </div>

                <!-- Produk Akhir -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div class="text-amber-600 mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Produk Akhir</div>
                        <div class="font-bold text-gray-900 text-sm sm:text-base">{{ $layanan->produk_pelayanan ?? 'Dokumen KK (PDF/Fisik)' }}</div>
                    </div>
                </div>

                <!-- Jumlah Pelaksana -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div class="text-indigo-600 mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Jumlah Pelaksana</div>
                        <div class="font-bold text-gray-900 text-xs sm:text-sm">4 Orang Petugas Loket</div>
                        <div class="text-[10px] text-gray-500 mt-0.5">(Penanggung Jawab: Kasi Pem & Pelayanan Publik)</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Sistem, Mekanisme & Prosedur (Timeline Vertikal) -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 border-t-4 border-t-emerald-600 p-6 sm:p-8 mb-8">
            <div class="flex items-center gap-2 mb-6">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <h2 class="font-bold text-gray-900 text-base sm:text-lg">Sistem, Mekanisme & Prosedur</h2>
            </div>

            <!-- Garis Timeline Vertikal -->
            <div class="relative border-l-2 border-emerald-500 ml-3.5 space-y-6 sm:space-y-8 pl-6">
                
                <!-- Langkah 1 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-600 w-4 h-4 rounded-full border-2 border-white shadow"></div>
                    <h3 class="font-bold text-gray-900 text-sm sm:text-base">Pengajuan Berkas</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                        Pemohon menyerahkan kelengkapan berkas persyaratan kepada petugas di loket pelayanan Kecamatan Cihideung.
                    </p>
                </div>

                <!-- Langkah 2 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-600 w-4 h-4 rounded-full border-2 border-white shadow"></div>
                    <h3 class="font-bold text-gray-900 text-sm sm:text-base">Verifikasi & Validasi</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                        Petugas memverifikasi kelengkapan berkas. <strong>Jika lengkap</strong>, berkas akan divalidasi dan diinput ke dalam sistem kependudukan (SIAK).
                    </p>
                </div>

                <!-- Langkah 3 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-600 w-4 h-4 rounded-full border-2 border-white shadow"></div>
                    <h3 class="font-bold text-gray-900 text-sm sm:text-base">Pencetakan</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                        Setelah disetujui secara digital (TTE), dokumen Kartu Keluarga akan dicetak menggunakan kertas HVS A4 80 gram sesuai standar nasional.
                    </p>
                </div>

                <!-- Langkah 4 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-600 w-4 h-4 rounded-full border-2 border-white shadow"></div>
                    <h3 class="font-bold text-gray-900 text-sm sm:text-base">Penyerahan</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                        Pemohon mengambil KK yang sudah jadi atau menerima link download dokumen PDF melalui email/WhatsApp.
                    </p>
                </div>

            </div>
        </div>

        <!-- 4. Pengaduan Pelayanan -->
        <div class="bg-red-50/50 rounded-2xl border border-red-100 p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div class="flex items-center gap-2.5">
                    <div class="text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <h2 class="font-bold text-red-900 text-base sm:text-lg">Pengaduan Pelayanan</h2>
                </div>

                <!-- Tombol Lapor via SP4N LAPOR -->
                <a href="https://www.lapor.go.id" target="_blank" class="bg-[#b91c1c] hover:bg-red-800 text-white font-semibold text-xs py-2.5 px-5 rounded-xl shadow-sm transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    Lapor via SP4N LAPOR
                </a>
            </div>

            <p class="text-xs sm:text-sm text-gray-600 mb-6">
                Apabila terdapat ketidaksesuaian atau keluhan terkait pelayanan, silakan hubungi saluran resmi kami:
            </p>

            <div class="space-y-3 text-xs sm:text-sm text-gray-700">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <span>(0265) 123456 - Ext. 102</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>pengaduan.cihideung@tasikmalayakota.go.id</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.198-.198.347-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp: 081312226045</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection