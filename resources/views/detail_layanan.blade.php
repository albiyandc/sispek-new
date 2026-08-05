@extends('layouts.app')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen pb-20 pt-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-xs text-slate-400 mb-6 flex items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a> 
            <span>&rsaquo;</span> 
            <span>Pelayanan Publik</span> 
            <span>&rsaquo;</span> 
            <span>{{ $layanan->nama_kecamatan ?? 'Cihideung' }}</span> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-blue-600">{{ $layanan->nama_layanan ?? 'Detail Layanan' }}</span>
        </div>

        <!-- Header Judul Layanan -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 mb-8 border border-slate-100 shadow-sm flex items-start gap-4 sm:gap-6 relative overflow-hidden">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 shadow-sm">
                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">badge</span>
            </div>
            <div>
                <div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-[10px] font-extrabold uppercase tracking-wider mb-2">
                    {{ $layanan->nama_kecamatan ?? 'KECAMATAN CIHIDEUNG' }}
                </div>
                <h1 class="text-xl sm:text-3xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    {{ $layanan->nama_layanan ?? 'Pembuatan Kartu Keluarga (KK)' }}
                </h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-2 leading-relaxed">
                    {{ $layanan->produk_pelayanan ?? 'Layanan penerbitan dokumen Kartu Keluarga baru karena perubahan data, pecah KK, atau hilang/rusak bagi warga di wilayah Kecamatan Cihideung, Kota Tasikmalaya.' }}
                </p>
            </div>
        </div>

        <!-- 1. Kotak Persyaratan Layanan -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8 mb-8 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-2 h-full bg-blue-600"></div>
            <div class="flex items-center gap-2.5 mb-6 pl-2">
                <span class="material-symbols-outlined text-blue-600 text-2xl">assignment_turned_in</span>
                <h2 class="font-extrabold text-slate-900 text-base sm:text-lg">Persyaratan Layanan</h2>
            </div>

            <!-- List persyaratan dengan centang hijau -->
            <div class="space-y-3.5 text-xs sm:text-sm text-slate-700 pl-2">
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
                            <span class="material-symbols-outlined text-xl">check_circle</span>
                        </div>
                        <span class="leading-relaxed font-medium text-slate-700">{{ trim($item) }}</span>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- 2. Informasi Layanan (Grid 4 Kolom) -->
        <div class="mb-8">
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-blue-600 text-xl">info</span>
                <h2 class="font-extrabold text-slate-900 text-base sm:text-lg">Informasi Standar Layanan</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Waktu Pelayanan -->
                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex flex-col justify-start">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-3">
                        <span class="material-symbols-outlined text-xl">schedule</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Waktu Penyelesaian</div>
                    <div class="font-extrabold text-slate-900 text-xs sm:text-sm">{{ $layanan->waktu_penyelesaian ?? '1-3 Hari Kerja' }}</div>
                </div>

                <!-- Biaya / Tarif -->
                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex flex-col justify-start">
                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                        <span class="material-symbols-outlined text-xl">payments</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Biaya / Tarif</div>
                    <div class="font-extrabold text-emerald-600 text-xs sm:text-sm">{{ $layanan->biaya_tarif ?? ($layanan->biaya ?? 'Gratis (Rp 0)') }}</div>
                </div>

                <!-- Produk Akhir -->
                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex flex-col justify-start">
                    <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-3">
                        <span class="material-symbols-outlined text-xl">description</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Produk Pelayanan</div>
                    <div class="font-extrabold text-slate-900 text-xs sm:text-sm">{{ $layanan->produk_pelayanan ?? 'Dokumen Resmi' }}</div>
                </div>

                <!-- Jumlah Pelaksana -->
                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex flex-col justify-start">
                    <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-3">
                        <span class="material-symbols-outlined text-xl">group</span>
                    </div>
                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Jumlah Pelaksana</div>
                    <div class="font-extrabold text-slate-900 text-xs sm:text-sm">Petugas Loket</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">(Sesuai SK Penyelenggara)</div>
                </div>
            </div>
        </div>

        <!-- 3. Sistem, Mekanisme & Prosedur (Timeline Vertikal) -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8 mb-8 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-2 h-full bg-emerald-500"></div>
            <div class="flex items-center gap-2 mb-6 pl-2">
                <span class="material-symbols-outlined text-emerald-600 text-2xl">account_tree</span>
                <h2 class="font-extrabold text-slate-900 text-base sm:text-lg">Prosedur & Alur Pengajuan</h2>
            </div>

            <!-- Garis Timeline Vertikal -->
            <div class="relative border-l-2 border-emerald-500/30 ml-4 space-y-6 sm:space-y-8 pl-6 my-2">
                @php
                    $prosedurText = $layanan->prosedur ?? '';
                    $prosedurLines = array_filter(explode("\n", $prosedurText));
                @endphp

                @if(count($prosedurLines) > 0)
                    @foreach($prosedurLines as $pLine)
                        <div class="relative">
                            <div class="absolute -left-[31px] bg-emerald-500 w-4 h-4 rounded-full border-2 border-white shadow-md mt-0.5"></div>
                            <p class="text-xs sm:text-sm font-semibold text-slate-800 leading-relaxed">{{ trim($pLine) }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="relative">
                        <div class="absolute -left-[31px] bg-emerald-500 w-4 h-4 rounded-full border-2 border-white shadow-md mt-0.5"></div>
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base">Pengajuan Berkas</h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">Pemohon menyerahkan kelengkapan berkas persyaratan ke loket pelayanan kecamatan.</p>
                    </div>
                    <div class="relative">
                        <div class="absolute -left-[31px] bg-emerald-500 w-4 h-4 rounded-full border-2 border-white shadow-md mt-0.5"></div>
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base">Verifikasi & Validasi</h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">Petugas memverifikasi keabsahan dokumen dan menginput data ke dalam sistem.</p>
                    </div>
                    <div class="relative">
                        <div class="absolute -left-[31px] bg-emerald-500 w-4 h-4 rounded-full border-2 border-white shadow-md mt-0.5"></div>
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base">Proses & Penyerahan</h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">Dokumen diproses, ditandatangani, dan diserahkan secara resmi kepada pemohon.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- 4. Pengaduan Pelayanan -->
        <div class="bg-gradient-to-br from-rose-50 to-red-50/50 rounded-3xl border border-rose-100 p-6 sm:p-8 shadow-sm">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div class="flex items-center gap-2.5">
                    <div class="w-10 h-10 rounded-2xl bg-rose-600 text-white flex items-center justify-center shrink-0 shadow-md">
                        <span class="material-symbols-outlined text-xl">campaign</span>
                    </div>
                    <h2 class="font-extrabold text-rose-900 text-base sm:text-lg">Kanal Pengaduan Pelayanan</h2>
                </div>

                <!-- Tombol Lapor via SP4N LAPOR -->
                <a href="https://www.lapor.go.id" target="_blank" class="bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs py-3 px-6 rounded-2xl shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">report_problem</span>
                    <span>Lapor via SP4N LAPOR!</span>
                </a>
            </div>

            <p class="text-xs sm:text-sm text-slate-600 mb-6">
                Apabila terdapat kendala, ketidaksesuaian prosedur, atau keluhan terkait pelayanan, silakan hubungi saluran resmi:
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs sm:text-sm text-slate-700 font-semibold">
                <div class="flex items-center gap-3 p-3 bg-white/80 rounded-2xl border border-rose-100">
                    <span class="material-symbols-outlined text-rose-600 text-lg">call</span>
                    <span>(0265) 123456 - Ext 102</span>
                </div>
                <div class="flex items-center gap-3 p-3 bg-white/80 rounded-2xl border border-rose-100">
                    <span class="material-symbols-outlined text-rose-600 text-lg">mail</span>
                    <span class="break-all text-[11px]">pengaduan.cihideung@tasikmalayakota.go.id</span>
                </div>
                <div class="flex items-center gap-3 p-3 bg-white/80 rounded-2xl border border-rose-100">
                    <span class="material-symbols-outlined text-rose-600 text-lg">chat</span>
                    <span>WhatsApp: 081312226045</span>
                </div>
            </div>
        </div>

        @if(isset($layananSerupa) && count($layananSerupa) > 0)
        <!-- 5. Layanan Serupa Tersedia di Instansi Lain (Konsep SIPPN) -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8 mt-8">
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-blue-600">domain</span>
                <h2 class="font-extrabold text-slate-900 text-base sm:text-lg">Layanan Serupa Tersedia Di</h2>
            </div>
            <p class="text-xs sm:text-sm text-slate-500 mb-4">
                Layanan <span class="font-bold text-slate-800">{{ $layanan->nama_layanan ?? '' }}</span> ini juga diselenggarakan secara resmi di kecamatan/instansi berikut:
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                @foreach($layananSerupa as $serupa)
                <a href="{{ route('layanan.detail', $serupa->id) }}" class="flex items-center gap-3 p-3.5 rounded-2xl bg-slate-50 hover:bg-blue-50/80 border border-slate-100 transition-all group">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                        {{ substr($serupa->instansi->nama_instansi ?? 'I', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-bold text-xs text-slate-900 group-hover:text-blue-600 transition-colors truncate">
                            {{ $serupa->instansi->nama_instansi ?? 'Instansi' }}
                        </div>
                        <div class="text-[10px] text-slate-400 font-semibold">Lihat Persyaratan &rsaquo;</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection