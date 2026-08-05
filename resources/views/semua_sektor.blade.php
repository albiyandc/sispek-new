@extends('layouts.app')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen pb-20 pt-0 sm:pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb (Desktop Only) -->
        <div class="hidden sm:flex text-xs text-slate-400 mb-6 items-center gap-2 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a> 
            <span>&rsaquo;</span> 
            <span class="text-slate-700 font-bold">Semua Sektor Pelayanan</span>
        </div>

        <!-- Header Banner (Mobile Edge-to-Edge) -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white rounded-none sm:rounded-3xl -mx-4 -mt-28 pt-28 px-6 pb-8 sm:mx-0 sm:mt-0 sm:p-12 mb-10 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10 max-w-3xl">
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white mb-3">Sektor Pelayanan Publik</h1>
                <p class="text-xs sm:text-base text-slate-300 leading-relaxed">Seluruh sektor kategorial pelayanan publik resmi Kota Tasikmalaya.</p>
            </div>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('sektor.semua') }}" method="GET" class="mb-8 max-w-2xl">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                    <span class="material-symbols-outlined text-xl">search</span>
                </div>
                <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Cari sektor pelayanan..." class="w-full bg-white border border-slate-200/80 rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none shadow-sm transition-all">
            </div>
        </form>
        
        @if(count($sektors) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                @foreach($sektors as $sektor)
                <a href="{{ route('sektor.show', $sektor['slug']) }}" class="group bg-white p-6 sm:p-7 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-500/5 hover:-translate-y-1.5 transition-all duration-300 flex items-start gap-5 relative overflow-hidden">
                    <div class="w-14 h-14 rounded-2xl {{ $sektor['bg_color'] }} flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-sm">
                        <span class="material-symbols-outlined {{ $sektor['text_color'] }} text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $sektor['icon'] }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1.5 group-hover:text-blue-600 transition-colors line-clamp-1">{{ $sektor['nama'] }}</h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed mb-4">{{ $sektor['deskripsi'] }}</p>
                        <div class="text-blue-600 text-xs font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                            <span>Jelajahi Sektor</span>
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 sm:p-20 text-center border border-slate-100 shadow-sm">
                <div class="bg-blue-50 text-blue-400 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl sm:text-4xl">search_off</span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Sektor Tidak Ditemukan</h3>
                <p class="text-xs sm:text-sm text-slate-500">Tidak ada sektor pelayanan yang cocok dengan pencarian "{{ $query }}".</p>
                <a href="{{ route('sektor.semua') }}" class="inline-block mt-6 px-6 py-2.5 bg-blue-600 text-white rounded-full text-xs sm:text-sm font-bold hover:bg-blue-700 transition-colors shadow-md">Tampilkan Semua Sektor</a>
            </div>
        @endif

    </div>
</div>
@endsection
