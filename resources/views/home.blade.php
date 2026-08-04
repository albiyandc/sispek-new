@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-16 lg:py-24 fade-in-up">
        <!-- Menggunakan flex-row agar poster tetap di kanan pada HP -->
        <div class="flex flex-row justify-between items-center gap-2 sm:gap-12">
            
            <!-- Text Content -->
            <div class="w-3/5 lg:w-1/2">
                <div class="inline-block bg-green-100 text-green-700 px-2 py-0.5 sm:px-3 sm:py-1 text-[8px] sm:text-xs font-bold rounded-full uppercase tracking-wider mb-2 sm:mb-6 border border-green-200">
                    Portal Resmi Pelayanan
                </div>
                <h1 class="text-lg sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-2 sm:mb-6 tracking-tight">
                    Selamat Datang di <br><span class="text-[#1e3a8a]">SISPEK</span> <span class="hidden sm:inline">Tasikmalaya!</span>
                </h1>
                <p class="text-[9px] sm:text-lg text-gray-500 mb-4 sm:mb-8 max-w-lg leading-relaxed">
                    Sistem informasi standar pelayanan elektronik satu pintu untuk masyarakat Kota Tasikmalaya. <span class="hidden sm:inline">Terintegrasi, transparan, dan akuntabel.</span>
                </p>
                
                <!-- Search Box di Hero -->
                <div class="bg-white p-1 sm:p-2 rounded-xl shadow-md border border-gray-100 flex items-center max-w-lg transition-transform transform hover:-translate-y-1 hover:shadow-xl duration-300">
                    <div class="pl-2 sm:pl-4 text-gray-400">
                        <svg class="w-3 h-3 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" class="w-full py-1.5 px-2 sm:py-3 sm:px-4 text-gray-700 outline-none bg-transparent placeholder-gray-400 text-[9px] sm:text-base" placeholder="Pencarian Layanan...">
                    <button class="bg-[#1e3a8a] hover:bg-blue-800 text-white font-semibold p-1.5 sm:py-3 sm:px-6 rounded-lg sm:rounded-xl transition flex items-center justify-center">
                        <span class="hidden sm:inline whitespace-nowrap">Cari Sekarang</span>
                        <!-- Icon Search untuk Mobile -->
                        <svg class="sm:hidden w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>

                <!-- Checkmarks -->
                <div class="flex gap-2 sm:gap-6 mt-4 sm:mt-6 text-[8px] sm:text-sm text-gray-600 font-medium flex-wrap">
                    <div class="flex items-center gap-1 sm:gap-2"><svg class="w-3 h-3 sm:w-5 sm:h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Terintegrasi</div>
                    <div class="flex items-center gap-1 sm:gap-2"><svg class="w-3 h-3 sm:w-5 sm:h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Transparan</div>
                    <div class="flex items-center gap-1 sm:gap-2"><svg class="w-3 h-3 sm:w-5 sm:h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Akuntabel</div>
                </div>
            </div>

            <!-- Image Content (Tetap di kanan pada mobile) -->
            <div class="w-2/5 lg:w-1/2 flex justify-end">
                <img src="{{ asset('images/main-poster.png') }}"
                     alt="Main Poster"
                     class="w-full max-w-lg rounded-xl sm:rounded-3xl shadow-lg sm:shadow-2xl transform transition duration-500 hover:scale-105"
                     style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>

<!-- Daftar Kecamatan -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 fade-in-up delay-100">
    <div class="mb-6 sm:mb-10 text-center sm:text-left">
        <h2 class="text-xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">Layanan Publik di Kota Tasikmalaya</h2>
        <p class="text-xs sm:text-lg text-gray-500 max-w-3xl mx-auto sm:mx-0">Temukan berbagai layanan administrasi kependudukan, perizinan, dan informasi publik yang tersedia di setiap kecamatan.</p>
    </div>
    
    <!-- Tetap 4 ke samping pada layar kecil (grid-cols-4) -->
    <div class="grid grid-cols-4 gap-2 sm:gap-6">
        @foreach($kecamatans as $kecamatan)
        <!-- Kotak diubah menjadi bentuk persegi panjang (padding vertikal lebih kecil) -->
        <a href="{{ route('kecamatan.show', $kecamatan) }}" class="group bg-white rounded-lg sm:rounded-2xl py-3 px-1 sm:p-8 text-center flex flex-col items-center justify-center border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
            <!-- Dekorasi Hover -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-blue-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            <div class="relative z-10 bg-[#eef2ff] text-[#1e3a8a] w-8 h-8 sm:w-16 sm:h-16 rounded-md sm:rounded-2xl flex items-center justify-center mb-1.5 sm:mb-5 group-hover:scale-110 group-hover:bg-[#1e3a8a] group-hover:text-white transition-all duration-300 shadow-sm">
                <svg class="w-4 h-4 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            
            <h3 class="font-bold text-gray-900 text-[9px] sm:text-lg relative z-10 leading-tight">{{ $kecamatan }}</h3>
            
            <!-- Disembunyikan di mobile agar kotak tetap kecil dan rapi -->
            <p class="hidden sm:block text-sm text-gray-500 mt-1 mb-5 relative z-10">24 layanan tersedia</p>
            <div class="hidden sm:flex text-blue-600 text-sm font-semibold items-center gap-1 group-hover:gap-2 transition-all relative z-10">
                Pilih Daerah <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-8 sm:mt-12 flex justify-center">
        <button class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium text-xs sm:text-base py-2 px-5 sm:py-3 sm:px-8 rounded-full shadow-sm transition flex items-center gap-2">
            Lihat Semua Daerah <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
    </div>
</div>

<!-- Stats Section -->
<div class="border-t border-gray-100 bg-white fade-in-up delay-200">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8 sm:py-16">
        <!-- Informasi tetap memuat 4 ke samping (grid-cols-4) di HP -->
        <div class="grid grid-cols-4 gap-1 sm:gap-8 divide-x divide-gray-100 text-center">
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-extrabold text-[#1e3a8a] mb-0.5 sm:mb-2">10+</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Kecamatan</div>
            </div>
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-extrabold text-[#1e3a8a] mb-0.5 sm:mb-2">150+</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Layanan</div>
            </div>
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-extrabold text-[#1e3a8a] mb-0.5 sm:mb-2">24k</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Pemohon</div>
            </div>
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-extrabold text-[#1e3a8a] mb-0.5 sm:mb-2">98%</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Kepuasan</div>
            </div>
        </div>
    </div>
</div>
@endsection