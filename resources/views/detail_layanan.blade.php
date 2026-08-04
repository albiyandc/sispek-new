@extends('layouts.app')

@section('content')
<div class="bg-[#f8fafe] min-h-screen py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-medium text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#0b53c8] transition">Beranda</a>
            <span class="text-gray-400">&rsaquo;</span>
            <a href="#" class="hover:text-[#0b53c8] transition">Pelayanan Publik</a>
            <span class="text-gray-400">&rsaquo;</span>
            <a href="{{ route('kecamatan.show', $nama_kecamatan ?? 'Cihideung') }}" class="hover:text-[#0b53c8] transition">{{ $nama_kecamatan ?? 'Cihideung' }}</a>
            <span class="text-gray-400">&rsaquo;</span>
            <span class="font-bold text-[#0b53c8]">{{ $layanan->nama_layanan }}</span>
        </nav>

        <!-- Header Title Block -->
        <div class="flex items-start gap-4 md:gap-5 mb-8">
            <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-[#e8f1ff] text-[#0b53c8] flex items-center justify-center shrink-0 shadow-sm mt-1">
                <svg class="w-6 h-6 md:w-7 md:h-7" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">{{ $layanan->nama_layanan }}</h1>
                <p class="text-sm md:text-base text-gray-600 mt-2 leading-relaxed max-w-4xl">
                    {{ $layanan->deskripsi ?? ('Layanan penerbitan dokumen ' . $layanan->nama_layanan . ' baru karena perubahan data, pecah KK, atau hilang/rusak bagi warga di wilayah Kecamatan ' . ($nama_kecamatan ?? 'Cihideung') . ', Kota Tasikmalaya.') }}
                </p>
            </div>
        </div>

        <!-- Section 1: Persyaratan Layanan -->
        <div class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border border-slate-200/60 border-t-4 border-t-[#0b53c8] mb-8">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-6 h-6 text-[#0b53c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h2 class="text-xl font-bold text-gray-900">Persyaratan Layanan</h2>
            </div>

            <ul class="space-y-3.5 text-sm md:text-base text-gray-700">
                @php
                    $persyaratanList = array_filter(explode("\n", str_replace("\r", "", $layanan->persyaratan)));
                @endphp
                @foreach($persyaratanList as $item)
                    @if(trim($item))
                        <li class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="leading-relaxed">{{ trim($item) }}</span>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <!-- Section 2: Informasi Layanan -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-[#0b53c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-xl font-bold text-gray-900">Informasi Layanan</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Card 1: Waktu Pelayanan -->
                <div class="bg-[#f0f4fb] rounded-2xl p-5 border border-slate-100/80">
                    <div class="w-9 h-9 rounded-xl bg-[#e0ebfd] text-[#0b53c8] flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-[10px] font-bold tracking-wider text-gray-500 uppercase">Waktu Pelayanan</div>
                    <div class="text-sm font-bold text-gray-900 mt-1">{{ $layanan->waktu_penyelesaian ?? '3–5 Hari Kerja' }}</div>
                </div>

                <!-- Card 2: Biaya / Tarif -->
                <div class="bg-[#f0f4fb] rounded-2xl p-5 border border-slate-100/80">
                    <div class="w-9 h-9 rounded-xl bg-[#dcfeeb] text-[#059669] flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-[10px] font-bold tracking-wider text-gray-500 uppercase">Biaya / Tarif</div>
                    <div class="text-sm font-bold text-[#059669] mt-1">{{ $layanan->biaya_tarif ?? 'Gratis (Rp. 0)' }}</div>
                </div>

                <!-- Card 3: Produk Akhir -->
                <div class="bg-[#f0f4fb] rounded-2xl p-5 border border-slate-100/80">
                    <div class="w-9 h-9 rounded-xl bg-[#fef3c7] text-[#d97706] flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <div class="text-[10px] font-bold tracking-wider text-gray-500 uppercase">Produk Akhir</div>
                    <div class="text-sm font-bold text-gray-900 mt-1">{{ $layanan->produk_pelayanan ?? 'Dokumen KK (PDF/Fisik)' }}</div>
                </div>

                <!-- Card 4: Jumlah Pelaksana -->
                <div class="bg-[#f0f4fb] rounded-2xl p-5 border border-slate-100/80">
                    <div class="w-9 h-9 rounded-xl bg-[#e0ebfd] text-[#0b53c8] flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-[10px] font-bold tracking-wider text-gray-500 uppercase">Jumlah Pelaksana</div>
                    <div class="text-sm font-bold text-gray-900 mt-1">{{ $layanan->jumlah_pelaksana ?? '4 Orang Petugas Loket' }}</div>
                    <div class="text-[11px] text-gray-500 mt-0.5">({{ $layanan->penanggung_jawab ? 'Penanggung Jawab: ' . $layanan->penanggung_jawab : 'Penanggung Jawab: Kasi Pem & Pelayanan Publik' }})</div>
                </div>
            </div>
        </div>

        <!-- Section 3: Sistem, Mekanisme & Prosedur -->
        <div class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border border-slate-200/60 border-t-4 border-t-emerald-500 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                </svg>
                <h2 class="text-xl font-bold text-gray-900">Sistem, Mekanisme & Prosedur</h2>
            </div>

            <div class="relative pl-6 space-y-6 before:absolute before:left-2 before:top-2.5 before:bottom-2.5 before:w-0.5 before:bg-slate-200">
                @php
                    $prosedurList = array_filter(explode("\n", str_replace("\r", "", $layanan->sistem_mekanisme_prosedur)));
                @endphp
                @foreach($prosedurList as $index => $prosedur)
                    @php
                        $parts = explode('|', $prosedur, 2);
                        $title = count($parts) > 1 ? trim($parts[0]) : 'Langkah ' . ($index + 1);
                        $desc = count($parts) > 1 ? trim($parts[1]) : trim($prosedur);
                    @endphp
                    <div class="relative">
                        <div class="absolute -left-[23.5px] top-1.5 w-3.5 h-3.5 rounded-full bg-emerald-600 ring-4 ring-white"></div>
                        <h3 class="font-bold text-gray-900 text-sm md:text-base">{{ $title }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 mt-1 leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section 4: Pengaduan Pelayanan -->
        <div class="bg-[#fef2f2] rounded-2xl p-6 lg:p-8 border border-red-100/80 mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-6 h-6 text-[#c81e1e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c.41 0 .762.247.9.615l.394 1.127m0 0l2.316 6.617c.22.628.784 1.05 1.442 1.05h1.238"></path>
                    </svg>
                    <h2 class="text-xl font-bold text-[#c81e1e]">Pengaduan Pelayanan</h2>
                </div>
                <p class="text-xs md:text-sm text-gray-600 mb-4">
                    Apabila terdapat ketidaksesuaian atau keluhan terkait pelayanan, silakan hubungi saluran resmi kami:
                </p>

                <div class="space-y-2 text-xs md:text-sm text-gray-700">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>(0265) 123456 - Ext. 102</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>pengaduan.{{ strtolower($nama_kecamatan ?? 'cihideung') }}@tasikmalaya.go.id</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <span>WhatsApp: 081312226045</span>
                    </div>
                </div>
            </div>

            <div class="shrink-0 self-start md:self-center">
                <a href="https://www.lapor.go.id" target="_blank" class="bg-[#c81e1e] hover:bg-red-800 text-white text-xs md:text-sm font-semibold px-5 py-3 rounded-xl flex items-center gap-2 shadow-sm hover:shadow transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c.41 0 .762.247.9.615l.394 1.127m0 0l2.316 6.617c.22.628.784 1.05 1.442 1.05h1.238"></path>
                    </svg>
                    <span>Lapor via SP4N LAPOR</span>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection