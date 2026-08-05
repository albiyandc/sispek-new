@extends('layouts.app')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen pb-20 pt-0 sm:pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb (Desktop Only) -->
        <div class="hidden sm:flex text-xs text-slate-400 mb-6 items-center gap-2 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="{{ route('sektor.semua') }}" class="hover:text-blue-600 transition-colors">Sektor Pelayanan</a> 
            <span>&rsaquo;</span> 
            <span class="text-slate-700 font-bold">{{ $sektor['nama'] }}</span>
        </div>

        <!-- Ambient Header Banner (Mobile Edge-to-Edge) -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white rounded-none sm:rounded-3xl -mx-4 -mt-28 pt-28 px-6 pb-8 sm:mx-0 sm:mt-0 sm:p-12 mb-10 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10 max-w-3xl">
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white mb-3">Sektor <span class="bg-gradient-to-r from-blue-400 to-indigo-300 bg-clip-text text-transparent">{{ $sektor['nama'] }}</span></h1>
                <p class="text-xs sm:text-base text-slate-300 leading-relaxed">{{ $sektor['deskripsi'] }}</p>
            </div>
        </div>
        
        @if(count($services) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                @foreach($services as $service)
                <a href="{{ route('kategori.show', ['kategori' => $service['kategori_slug'], 'service_id' => $service['id']]) }}" class="group bg-white p-6 sm:p-7 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/5 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                    <div class="flex items-center gap-4 sm:gap-5 mb-4">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl {{ $service['bg_color'] }} flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-sm">
                            <span class="material-symbols-outlined {{ $service['text_color'] }} text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $service['icon'] }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2 mb-1.5">
                                <span class="text-[10px] font-extrabold text-blue-700 bg-blue-50 px-2.5 py-0.5 rounded-full uppercase tracking-wider truncate">{{ str_replace(['Kecamatan ', 'kecamatan ', 'KECAMATAN '], '', $service['kecamatan']) }}</span>
                                <span class="text-[10px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-full">{{ $service['kategori'] }}</span>
                            </div>
                            <h3 class="text-sm sm:text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-1">{{ $service['judul'] }}</h3>
                            <p class="text-xs sm:text-sm text-slate-500 line-clamp-2 leading-relaxed">{{ $service['deskripsi'] }}</p>
                        </div>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-blue-600 group-hover:text-blue-700">
                        <span>Pilih Daerah Penyelenggara</span>
                        <span class="material-symbols-outlined text-base group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 sm:p-20 text-center border border-slate-100 shadow-sm">
                <div class="bg-blue-50 text-blue-400 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl sm:text-4xl">search_off</span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Tidak Ada Layanan</h3>
                <p class="text-xs sm:text-sm text-slate-500">Belum ada daftar layanan publik untuk sektor {{ $sektor['nama'] }}.</p>
                <a href="{{ route('home') }}" class="inline-block mt-6 px-6 py-2.5 bg-blue-600 text-white rounded-full text-xs sm:text-sm font-bold hover:bg-blue-700 transition-colors shadow-md">Kembali ke Beranda</a>
            </div>
        @endif

    </div>
</div>
@endsection
