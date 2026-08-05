@extends('layouts.app')

@section('content')
<div class="bg-[#fcfdfd] min-h-screen pb-16 pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-[10px] sm:text-xs text-gray-500 mb-6 flex items-center gap-2 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="{{ route('home') }}#sektor-layanan" class="hover:text-blue-600 transition">Sektor Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-gray-800">{{ $sektor['nama'] }}</span>
        </div>

        <!-- Header -->
        <div class="mb-8 sm:mb-12 text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">Sektor Pelayanan <span class="text-[#1e3a8a]">{{ $sektor['nama'] }}</span></h2>
            <p class="text-[11px] sm:text-base text-gray-500 max-w-3xl mx-auto sm:mx-0">Pilih jenis layanan publik di bawah ini untuk mencari daerah/kecamatan yang menyediakannya.</p>
        </div>
        
        @if(count($services) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                @foreach($services as $service)
                <a href="{{ route('kategori.show', ['kategori' => $service['kategori_slug'], 'service_id' => $service['id']]) }}" class="group bg-white p-5 sm:p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start gap-4 sm:gap-5">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl {{ $service['bg_color'] }} flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined {{ $service['text_color'] }}" style="font-variation-settings: 'FILL' 1;">{{ $service['icon'] }}</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-[10px] sm:text-xs font-bold text-green-700 uppercase tracking-tight">{{ $service['kecamatan'] }}</span>
                                <span class="bg-blue-50 text-blue-700 text-[9px] sm:text-[10px] px-2 py-0.5 rounded-full font-bold">{{ $service['kategori'] }}</span>
                            </div>
                            <h4 class="text-sm sm:text-lg font-semibold text-gray-900 mb-1 sm:mb-2 group-hover:text-[#1e3a8a] transition-colors">{{ $service['judul'] }}</h4>
                            <p class="text-xs sm:text-sm text-gray-500 line-clamp-2 mb-3 sm:mb-4">{{ $service['deskripsi'] }}</p>
                            <div class="text-blue-700 text-xs sm:text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                                Pilih Daerah <span class="material-symbols-outlined text-xs sm:text-sm">arrow_forward</span>
                            </div>
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
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Tidak Ada Layanan</h3>
                <p class="text-xs sm:text-sm text-gray-500">Belum ada daftar layanan publik untuk sektor {{ $sektor['nama'] }}.</p>
                <a href="{{ route('home') }}" class="inline-block mt-6 px-6 py-2 bg-[#1e3a8a] text-white rounded-full text-xs sm:text-sm font-medium hover:bg-blue-800 transition-colors">Kembali ke Beranda</a>
            </div>
        @endif

    </div>
</div>
@endsection
