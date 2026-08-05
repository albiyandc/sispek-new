@extends('layouts.app')

@section('content')
<!-- Background utama -->
<div class="bg-[#f8fafc] min-h-screen pb-20 pt-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-[10px] sm:text-xs text-slate-500 mb-6 flex items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-[#0b53c8] transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="#" class="hover:text-[#0b53c8] transition">Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            <a href="#" class="hover:text-[#0b53c8] transition">{{ $layanan->nama_kecamatan ?? 'Cihideung' }}</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-[#0b53c8]">{{ $layanan->nama_layanan ?? 'Pembuatan Kartu Keluarga (KK)' }}</span>
        </div>

        <!-- Header Judul Layanan -->
        <div class="flex items-start gap-4 mb-8">
            <div class="bg-blue-50 text-[#0b53c8] w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center shrink-0 shadow-inner">
                <span class="material-symbols-outlined text-2xl sm:text-3xl" style="font-variation-settings: 'FILL' 1;">badge</span>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">
                    {{ $layanan->nama_layanan ?? 'Pembuatan Kartu Keluarga (KK)' }}
                </h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">
                    {{ $layanan->produk_pelayanan ?? 'Layanan penerbitan dokumen Kartu Keluarga baru karena perubahan data, pecah KK, atau hilang/rusak bagi warga di wilayah Kecamatan Cihideung, Kota Tasikmalaya.' }}
                </p>
            </div>
        </div>

        <!-- 1. Kotak Persyaratan Layanan -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 border-t-4 border-t-[#0b53c8] p-6 sm:p-8 mb-8">
            <div class="flex items-center gap-2.5 mb-5">
                <span class="material-symbols-outlined text-[#0b53c8] text-xl">assignment_turned_in</span>
                <h2 class="font-bold text-slate-900 text-base sm:text-lg">Persyaratan Layanan</h2>
            </div>

            <!-- List persyaratan dengan centang hijau -->
            <div class="space-y-3.5 text-xs sm:text-sm text-slate-700">
                @php
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
                        <div class="text-emerald-500 shrink-0 mt-0.5">
                            <span class="material-symbols-outlined text-lg">check_circle</span>
                        </div>
                        <span class="leading-relaxed text-slate-700 font-medium">{{ trim($item) }}</span>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- 2. Informasi Layanan (Grid 4 Kolom) -->
        <div class="mb-8">
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-[#0b53c8] text-xl">info</span>
                <h2 class="font-bold text-slate-900 text-base sm:text-lg">Informasi Layanan</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Waktu Pelayanan -->
                <div class="bg-[#f0f4fc] rounded-2xl p-5 flex flex-col justify-start border border-blue-50/50">
                    <div class="text-[#0b53c8] mb-3">
                        <span class="material-symbols-outlined text-xl">schedule</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">WAKTU PELAYANAN</div>
                    <div class="font-bold text-slate-900 text-xs sm:text-sm">{{ $layanan->waktu_penyelesaian ?? '3–5 Hari Kerja' }}</div>
                </div>

                <!-- Biaya / Tarif -->
                <div class="bg-[#f0f4fc] rounded-2xl p-5 flex flex-col justify-start border border-blue-50/50">
                    <div class="text-emerald-600 mb-3">
                        <span class="material-symbols-outlined text-xl">payments</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">BIAYA / TARIF</div>
                    <div class="font-bold text-emerald-600 text-xs sm:text-sm">{{ $layanan->biaya_tarif ?? 'Gratis (Rp. 0)' }}</div>
                </div>

                <!-- Produk Akhir -->
                <div class="bg-[#f0f4fc] rounded-2xl p-5 flex flex-col justify-start border border-blue-50/50">
                    <div class="text-amber-600 mb-3">
                        <span class="material-symbols-outlined text-xl">verified</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">PRODUK AKHIR</div>
                    <div class="font-bold text-slate-900 text-xs sm:text-sm">{{ $layanan->produk_pelayanan ?? 'Dokumen KK (PDF/Fisik)' }}</div>
                </div>

                <!-- Jumlah Pelaksana -->
                <div class="bg-[#f0f4fc] rounded-2xl p-5 flex flex-col justify-start border border-blue-50/50">
                    <div class="text-indigo-600 mb-3">
                        <span class="material-symbols-outlined text-xl">group</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">JUMLAH PELAKSANA</div>
                    <div class="font-bold text-slate-900 text-xs sm:text-sm">4 Orang Petugas Loket</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">(Penanggung Jawab: Kasi Pem & Pelayanan Publik)</div>
                </div>
            </div>
        </div>

        <!-- 3. Sistem, Mekanisme & Prosedur (Timeline Vertikal) -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 border-t-4 border-t-emerald-600 p-6 sm:p-8 mb-8">
            <div class="flex items-center gap-2 mb-6">
                <span class="material-symbols-outlined text-emerald-600 text-xl">account_tree</span>
                <h2 class="font-bold text-slate-900 text-base sm:text-lg">Sistem, Mekanisme & Prosedur</h2>
            </div>

            <!-- Garis Timeline Vertikal -->
            <div class="relative border-l-2 border-emerald-500 ml-3 space-y-6 sm:space-y-8 pl-6">
                
                <!-- Langkah 1 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-500 w-3.5 h-3.5 rounded-full border-2 border-white shadow-sm mt-0.5"></div>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Pengajuan Berkas</h3>
                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                        Pemohon menyerahkan kelengkapan berkas persyaratan kepada petugas di loket pelayanan Kecamatan {{ $layanan->nama_kecamatan ?? 'Cihideung' }}.
                    </p>
                </div>

                <!-- Langkah 2 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-500 w-3.5 h-3.5 rounded-full border-2 border-white shadow-sm mt-0.5"></div>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Verifikasi & Validasi</h3>
                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                        Petugas memverifikasi kelengkapan berkas. Jika lengkap, berkas akan divalidasi dan diinput ke dalam sistem kependudukan (SIAK).
                    </p>
                </div>

                <!-- Langkah 3 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-500 w-3.5 h-3.5 rounded-full border-2 border-white shadow-sm mt-0.5"></div>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Pencetakan</h3>
                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                        Setelah disetujui secara digital (TTE), dokumen akan dicetak sesuai standar peraturan yang berlaku.
                    </p>
                </div>

                <!-- Langkah 4 -->
                <div class="relative">
                    <div class="absolute -left-[31px] bg-emerald-500 w-3.5 h-3.5 rounded-full border-2 border-white shadow-sm mt-0.5"></div>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Penyerahan</h3>
                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                        Pemohon mengambil dokumen fisik yang sudah jadi atau menerima berkas digital resmi.
                    </p>
                </div>

            </div>
        </div>

        <!-- 4. Pengaduan Pelayanan -->
        <div class="bg-[#fef2f2] rounded-2xl border border-red-100 p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div class="flex items-center gap-2.5">
                    <div class="text-[#c5221f]">
                        <span class="material-symbols-outlined text-2xl">campaign</span>
                    </div>
                    <h2 class="font-bold text-[#991b1b] text-base sm:text-lg">Pengaduan Pelayanan</h2>
                </div>

                <!-- Tombol Lapor via SP4N LAPOR -->
                <a href="https://www.lapor.go.id" target="_blank" class="bg-[#c5221f] hover:bg-red-800 text-white font-semibold text-xs py-2.5 px-5 rounded-xl shadow-sm transition flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">record_voice_over</span>
                    Lapor via SP4N LAPOR
                </a>
            </div>

            <p class="text-xs sm:text-sm text-slate-600 mb-6">
                Apabila terdapat ketidaksesuaian atau keluhan terkait pelayanan, silakan hubungi saluran resmi kami:
            </p>

            <div class="space-y-3 text-xs sm:text-sm text-slate-700 font-medium">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[#c5221f] text-base shrink-0">call</span>
                    <span>(0265) 123456 - Ext. 102</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[#c5221f] text-base shrink-0">mail</span>
                    <span>pengaduan.{{ strtolower(str_replace(' ', '', $layanan->nama_kecamatan ?? 'cihideung')) }}@tasikmalayakota.go.id</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-emerald-600 text-base shrink-0">chat</span>
                    <span>WhatsApp: 081312226045</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection