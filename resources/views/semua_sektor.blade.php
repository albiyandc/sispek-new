@extends('layouts.app')

@section('content')
<div class="bg-[#fcfdfd] min-h-screen pb-16 pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-[10px] sm:text-xs text-gray-500 mb-6 flex items-center gap-2 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-gray-800">Semua Sektor Pelayanan</span>
        </div>

        <!-- Header -->
        <div class="mb-8 sm:mb-12 text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">Sektor Pelayanan Publik</h2>
            <p class="text-[11px] sm:text-base text-gray-500 max-w-3xl mx-auto sm:mx-0">Semua sektor bidang pelayanan publik yang tersedia di Kota Tasikmalaya.</p>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('sektor.semua') }}" method="GET" class="mb-8 max-w-2xl">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <span class="material-symbols-outlined text-lg">search</span>
                </div>
                <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Cari sektor pelayanan..." class="w-full bg-white border border-gray-200 rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-200 outline-none shadow-sm">
            </div>
        </form>
        
        @if(count($sektors) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($sektors as $sektor)
                <a href="{{ route('sektor.show', $sektor['slug']) }}" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-start gap-5">
                    <div class="w-14 h-14 rounded-xl {{ $sektor['bg_color'] }} flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                        <span class="material-symbols-outlined {{ $sektor['text_color'] }} text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $sektor['icon'] }}</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-base sm:text-lg font-bold text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">{{ $sektor['nama'] }}</h4>
                        <p class="text-xs text-gray-500 line-clamp-2 mb-3 leading-relaxed">{{ $sektor['deskripsi'] }}</p>
                        <div class="text-[#1e3a8a] text-xs font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                            Lihat Layanan <span class="material-symbols-outlined text-xs">arrow_forward</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl p-8 sm:p-16 text-center border border-gray-100 shadow-sm">
                <div class="bg-blue-50 text-blue-300 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl sm:text-4xl">search_off</span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Sektor Tidak Ditemukan</h3>
                <p class="text-xs sm:text-sm text-gray-500">Tidak ada sektor pelayanan yang cocok dengan pencarian "{{ $query }}".</p>
                <a href="{{ route('sektor.semua') }}" class="inline-block mt-6 px-6 py-2 bg-[#1e3a8a] text-white rounded-full text-xs sm:text-sm font-medium hover:bg-blue-800 transition-colors">Tampilkan Semua Sektor</a>
            </div>
        @endif

    </div>
</div>
@endsection
