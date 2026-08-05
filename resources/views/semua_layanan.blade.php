@extends('layouts.app')

@section('content')
<div class="bg-[#f8fafc] min-h-screen pb-16 pt-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-[10px] sm:text-xs text-slate-500 mb-6 flex items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-[#0b53c8] transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-[#0b53c8]">Semua Layanan Publik</span>
        </div>

        <!-- Header -->
        <div class="mb-8 sm:mb-12 text-center sm:text-left">
            @if(isset($query) && $query != '')
                <h2 class="text-xl sm:text-3xl font-extrabold text-slate-900 mb-2 sm:mb-3 tracking-tight">Hasil Pencarian: <span class="text-[#0b53c8]">{{ $query }}</span></h2>
                <p class="text-xs sm:text-sm text-slate-500 max-w-3xl mx-auto sm:mx-0">Menampilkan layanan publik yang cocok dengan kata kunci pencarian Anda.</p>
            @else
                <h2 class="text-xl sm:text-3xl font-extrabold text-slate-900 mb-2 sm:mb-3 tracking-tight">Semua Layanan Publik di Kota Tasikmalaya</h2>
                <p class="text-xs sm:text-sm text-slate-500 max-w-3xl mx-auto sm:mx-0">Jelajahi seluruh daftar layanan publik yang terintegrasi secara digital untuk mempermudah urusan administrasi Anda.</p>
            @endif
        </div>
        
        @if(count($services) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                @foreach($services as $service)
                <a href="{{ route('kategori.track', ['id' => $service['id'], 'kategori' => $service['kategori_slug']]) }}" class="group bg-white p-5 sm:p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-200 hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start gap-4 sm:gap-5">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl {{ $service['bg_color'] }} flex items-center justify-center shrink-0 shadow-inner group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined {{ $service['text_color'] }} text-2xl sm:text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $service['icon'] }}</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-[10px] sm:text-xs font-extrabold text-emerald-700 uppercase tracking-tight">{{ $service['kecamatan'] }}</span>
                                <span class="bg-blue-50 text-[#0b53c8] text-[9px] sm:text-[10px] px-2.5 py-0.5 rounded-full font-bold border border-blue-100/50">{{ $service['kategori'] }}</span>
                            </div>
                            <h4 class="text-sm sm:text-base font-bold text-slate-900 mb-1 sm:mb-1.5 group-hover:text-[#0b53c8] transition-colors leading-snug">{{ $service['judul'] }}</h4>
                            <p class="text-xs text-slate-500 line-clamp-2 mb-3 sm:mb-4 leading-relaxed">{{ $service['deskripsi'] }}</p>
                            <div class="text-[#0b53c8] text-xs font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                                Ajukan Layanan <span class="material-symbols-outlined text-sm">chevron_right</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl p-8 sm:p-16 text-center border border-slate-100 shadow-sm">
                <div class="bg-blue-50 text-[#0b53c8] w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl sm:text-4xl">search_off</span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Tidak Ada Data</h3>
                <p class="text-xs sm:text-sm text-slate-500">Belum ada data layanan publik yang sesuai dengan pencarian Anda.</p>
                <a href="{{ route('layanan.semua') }}" class="inline-block mt-6 px-6 py-2.5 bg-[#0b53c8] text-white rounded-full text-xs font-semibold hover:bg-blue-800 transition">Lihat Semua Layanan</a>
            </div>
        @endif
    </div>
</div>
@endsection
