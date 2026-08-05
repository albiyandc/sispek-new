@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden rounded-b-[40px] shadow-sm">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-20 lg:py-24 fade-in-up">
        <div class="flex flex-row justify-between items-center gap-4 sm:gap-12">
            
            <!-- Text Content -->
            <div class="w-1/2">
                <h1 class="text-xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-3 sm:mb-6 tracking-tight">
                    Selamat Datang di <br><span class="text-[#1e3a8a]">SISPEK</span> <span class="hidden sm:inline">Tasikmalaya!</span>
                </h1>
                
                <p class="text-[10px] sm:text-lg text-gray-500 mb-6 sm:mb-8 max-w-lg leading-relaxed">
                    Sistem informasi standar pelayanan elektronik satu pintu untuk masyarakat Kota Tasikmalaya.
                </p>

                <!-- Search Bar Hero -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="bg-white p-2 rounded-xl sm:rounded-2xl shadow-lg border border-gray-100 flex items-center gap-2 mb-6 sm:mb-8">
                    <div class="pl-2 sm:pl-4 text-[#1e3a8a]">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="q" placeholder="Pencarian Layanan, Berita dan Informasi" class="flex-1 bg-transparent border-0 focus:ring-0 text-xs sm:text-sm text-gray-700 placeholder-gray-400 py-2 sm:py-3 px-2 w-full outline-none">
                    <button type="submit" class="bg-[#003da5] hover:bg-blue-800 text-white px-4 sm:px-8 py-2 sm:py-3 rounded-lg sm:rounded-xl text-xs sm:text-sm font-semibold transition shadow-md whitespace-nowrap">
                        Cari Sekarang
                    </button>
                </form>

                <!-- Checkmarks -->
                <div class="flex gap-2 sm:gap-6 text-[9px] sm:text-sm text-gray-700 font-medium flex-wrap">
                    <div class="flex items-center gap-1 sm:gap-2">
                        <svg class="w-3 h-3 sm:w-5 sm:h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> 
                        Terintegrasi
                    </div>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <svg class="w-3 h-3 sm:w-5 sm:h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> 
                        Transparan
                    </div>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <svg class="w-3 h-3 sm:w-5 sm:h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> 
                        Akuntabel
                    </div>
                </div>
            </div>

            <!-- Image Content -->
            <div class="w-1/2 flex justify-end">
                <img src="{{ asset('images/main-poster.png') }}"
                     alt="Main Poster"
                     class="w-full max-w-lg rounded-xl sm:rounded-2xl transform transition duration-500 hover:scale-105"
                     style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>

<!-- Daftar Layanan Publik -->
<!-- ID daftar-daerah diubah menjadi daftar-layanan untuk scroll, jika diperlukan navbar juga bisa diubah -->
<div id="daftar-layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-20 fade-in-up delay-100 scroll-mt-24">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4 sm:gap-6">
        <div class="max-w-xl text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">Layanan Publik di Kota Tasikmalaya</h2>
            <p class="text-[11px] sm:text-base text-gray-500">Temukan berbagai layanan administrasi kependudukan, perizinan, dan informasi publik yang tersedia di setiap kecamatan.</p>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        @foreach($services as $service)
            @if($loop->iteration <= 10)
                <a href="{{ route('kategori.track', ['id' => $service['id'], 'kategori' => $service['kategori_slug']]) }}" class="group bg-white p-4 sm:p-6 rounded-2xl border border-gray-100 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4 sm:gap-5">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl {{ $service['bg_color'] }} flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined {{ $service['text_color'] }}" style="font-variation-settings: 'FILL' 1;">{{ $service['icon'] }}</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-[10px] sm:text-xs font-bold text-green-700 uppercase tracking-tight">{{ $service['kecamatan'] }}</span>
                                <span class="bg-blue-50 text-blue-700 text-[9px] sm:text-[10px] px-2 py-0.5 rounded-full font-bold">{{ $service['kategori'] }}</span>
                            </div>
                            <h4 class="text-sm sm:text-lg font-semibold text-gray-900 mb-1 sm:mb-2">{{ $service['judul'] }}</h4>
                            <p class="text-xs sm:text-sm text-gray-500 line-clamp-1 mb-3 sm:mb-4">{{ $service['deskripsi'] }}</p>
                            <div class="text-blue-700 text-xs sm:text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                                Ajukan Layanan <span class="material-symbols-outlined text-xs sm:text-sm">chevron_right</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>

    <!-- Tombol Tampilkan Lebih Banyak -->
    <div class="mt-8 sm:mt-12 flex justify-center">
        <a href="{{ route('layanan.semua') }}" class="bg-white border border-gray-200 text-blue-700 hover:bg-blue-50 font-medium text-xs sm:text-sm py-2 px-6 sm:py-3 sm:px-8 rounded-full shadow-sm transition flex items-center gap-2">
            Lihat Semua Layanan <span class="material-symbols-outlined text-sm sm:text-base">arrow_forward</span>
        </a>
    </div>
</div>

<!-- Stats Section -->
<div class="bg-transparent fade-in-up delay-200">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 pb-16">
        <div class="grid grid-cols-4 gap-1 sm:gap-8 divide-x divide-gray-200 text-center">
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-light text-[#1e3a8a] mb-0.5 sm:mb-2">10+</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Kecamatan</div>
            </div>
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-light text-[#1e3a8a] mb-0.5 sm:mb-2">150+</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Jenis Layanan</div>
            </div>
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-light text-[#1e3a8a] mb-0.5 sm:mb-2">24k</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Pemohon Aktif</div>
            </div>
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-light text-[#1e3a8a] mb-0.5 sm:mb-2">98%</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Indeks Kepuasan</div>
            </div>
        </div>
    </div>
</div>
@endsection