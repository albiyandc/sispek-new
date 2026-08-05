@extends('layouts.app')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen pb-20 pt-0 sm:pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb (Desktop Only) -->
        <div class="hidden sm:flex text-xs text-slate-400 mb-6 items-center gap-2 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="{{ route('layanan.semua') }}" class="hover:text-blue-600 transition-colors">Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            <span class="text-slate-700 font-bold">Layanan: {{ $namaLayanan }}</span>
        </div>

        <!-- Header Banner (Mobile Edge-to-Edge) -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white rounded-none sm:rounded-3xl -mx-4 -mt-28 pt-28 px-6 pb-8 sm:mx-0 sm:mt-0 sm:p-12 mb-10 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10 max-w-3xl">
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white mb-3">Wilayah yang Menyediakan <br><span class="bg-gradient-to-r from-blue-400 to-indigo-300 bg-clip-text text-transparent">{{ $namaLayanan }}</span></h1>
                <p class="text-xs sm:text-base text-slate-300 leading-relaxed">Pilih kecamatan di bawah ini untuk melihat persyaratan dan standar prosedur {{ strtolower($namaLayanan) }}.</p>
            </div>
        </div>
        
        @if(count($kecamatans) > 0)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                @foreach($kecamatans as $kecamatan)
                <a href="{{ route('kecamatan.show', ['nama_kecamatan' => $kecamatan, 'service_id' => $serviceId ?? null]) }}" class="group bg-white rounded-3xl p-6 sm:p-8 text-center flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/5 hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                    <div class="w-14 h-14 sm:w-18 sm:h-18 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">location_city</span>
                    </div>
                    
                    <h3 class="font-bold text-slate-900 text-sm sm:text-lg group-hover:text-blue-600 transition-colors leading-snug mb-1">{{ $kecamatan }}</h3>
                    <span class="text-[11px] font-semibold text-slate-400 group-hover:text-blue-500 transition-colors flex items-center gap-1">
                        Pilih Wilayah <span class="material-symbols-outlined text-xs">chevron_right</span>
                    </span>
                </a>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 sm:p-20 text-center border border-slate-100 shadow-sm">
                <div class="bg-blue-50 text-blue-400 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl sm:text-4xl">search_off</span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Belum Ada Data Wilayah</h3>
                <p class="text-xs sm:text-sm text-slate-500">Belum ada data kecamatan terdaftar untuk {{ $namaLayanan }}.</p>
                <a href="{{ route('home') }}" class="inline-block mt-6 px-6 py-2.5 bg-blue-600 text-white rounded-full text-xs sm:text-sm font-bold hover:bg-blue-700 transition-colors shadow-md">Kembali ke Beranda</a>
            </div>
        @endif

    </div>
</div>
@endsection
