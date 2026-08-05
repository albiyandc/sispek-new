@extends('layouts.app')

@section('content')
<div class="bg-[#f8fafc] min-h-screen pb-16 pt-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-[10px] sm:text-xs text-slate-500 mb-6 flex items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-[#0b53c8] transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="{{ route('home') }}#daftar-layanan" class="hover:text-[#0b53c8] transition">Pilihan Daerah</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-[#0b53c8]">{{ $namaLayanan }}</span>
        </div>

        <!-- Header -->
        <div class="mb-8 sm:mb-12 text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-extrabold text-slate-900 mb-2 sm:mb-3 tracking-tight">Kecamatan dengan Layanan <span class="text-[#0b53c8]">{{ $namaLayanan }}</span></h2>
            <p class="text-xs sm:text-sm text-slate-500 max-w-3xl mx-auto sm:mx-0">Pilih kecamatan di bawah ini untuk melihat detail layanan {{ strtolower($namaLayanan) }} yang tersedia.</p>
        </div>
        
        @if(count($kecamatans) > 0)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                @foreach($kecamatans as $kecamatan)
                <a href="{{ route('kecamatan.show', ['nama_kecamatan' => $kecamatan, 'service_id' => $serviceId ?? null]) }}" class="group bg-white rounded-2xl py-6 px-4 sm:p-8 text-center flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-200 hover:-translate-y-1.5 transition-all duration-300">
                    <!-- Icon -->
                    <div class="bg-blue-50 text-[#0b53c8] w-12 h-12 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center mb-3 sm:mb-4 group-hover:bg-[#0b53c8] group-hover:text-white transition-all duration-300 shadow-inner group-hover:scale-110">
                        <span class="material-symbols-outlined text-2xl sm:text-3xl">location_city</span>
                    </div>
                    
                    <h3 class="font-bold text-slate-800 text-sm sm:text-lg leading-tight group-hover:text-[#0b53c8] transition-colors">{{ $kecamatan }}</h3>
                </a>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl p-8 sm:p-16 text-center border border-slate-100 shadow-sm">
                <div class="bg-blue-50 text-[#0b53c8] w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl sm:text-4xl">search_off</span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Tidak Ada Data</h3>
                <p class="text-xs sm:text-sm text-slate-500">Belum ada data kecamatan untuk {{ $namaLayanan }}.</p>
                <a href="{{ route('home') }}" class="inline-block mt-6 px-6 py-2.5 bg-[#0b53c8] text-white rounded-full text-xs font-semibold hover:bg-blue-800 transition">Kembali ke Beranda</a>
            </div>
        @endif

    </div>
</div>
@endsection
