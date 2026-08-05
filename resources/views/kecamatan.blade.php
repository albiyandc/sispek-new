@extends('layouts.app')

@section('content')
<!-- Background Abu-abu Muda persis gambar -->
<div class="bg-[#fcfdfd] min-h-screen pb-16 pt-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-[10px] sm:text-xs text-gray-500 mb-6 flex items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="#" class="hover:text-blue-600 transition">Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-gray-800">Kecamatan {{ $nama_kecamatan }}</span>
        </div>

        <!-- Banner Biru -->
        <div class="bg-[#0b53c8] text-white rounded-2xl p-8 lg:p-10 mb-6 shadow-sm relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold mb-2 tracking-tight">Layanan Publik Kecamatan {{ $nama_kecamatan }}</h1>
                <p class="text-blue-100 max-w-2xl text-xs sm:text-sm leading-relaxed">
                    Akses cepat layanan administrasi, perizinan, dan kependudukan resmi untuk seluruh warga Kecamatan {{ $nama_kecamatan }}, Kota Tasikmalaya.
                </p>
            </div>
        </div>

        <!-- Maklumat Pelayanan Box -->
        <div class="bg-[#f0f4fc] rounded-2xl p-6 sm:p-8 mb-6 relative overflow-hidden border-l-4 border-l-[#0b53c8]">
            <div class="absolute top-2 right-4 text-gray-300 opacity-60 text-7xl font-serif select-none pointer-events-none">”</div>
            <div class="relative z-10">
                <div class="text-[10px] font-bold text-[#0b53c8] tracking-widest uppercase mb-3">MAKLUMAT PELAYANAN</div>
                <p class="text-gray-800 text-xs sm:text-sm italic font-medium leading-relaxed mb-6 pr-8">
                    "Dengan ini, kami menyatakan sanggup menyelenggarakan pelayanan sesuai standar pelayanan yang telah ditetapkan dan apabila tidak menepati janji ini, kami siap menerima sanksi sesuai peraturan perundang-undangan yang berlaku."
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-[#0b53c8] text-white flex items-center justify-center font-bold text-xs shadow-sm">
                        {{ substr($nama_kecamatan, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-xs">Camat {{ $nama_kecamatan }}</div>
                        <div class="text-[10px] text-gray-500">Pemerintah Kota Tasikmalaya</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Indeks Kepuasan Masyarakat (IKM) Box -->
        <div class="bg-[#f0f4fc] rounded-2xl p-5 sm:p-6 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-[#0b53c8] flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-xl">sentiment_satisfied</span>
                </div>
                <div>
                    <div class="font-bold text-gray-900 text-xs sm:text-sm">Indeks Kepuasan Masyarakat (IKM)</div>
                    <div class="text-[10px] text-gray-500 mt-0.5">Berdasarkan penilaian masyarakat periode terakhir</div>
                </div>
            </div>
            <div class="flex items-center gap-3 bg-white px-5 py-2.5 rounded-xl border border-gray-100 shadow-sm w-full sm:w-auto justify-around sm:justify-start">
                <div class="text-center pr-3 border-r border-gray-100">
                    <div class="text-lg font-extrabold text-[#0b53c8]">88.35</div>
                    <div class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">SKOR IKM</div>
                </div>
                <div class="text-center pl-1">
                    <div class="text-xs font-extrabold text-emerald-600">Kategori A</div>
                    <div class="text-[9px] font-bold text-emerald-600 uppercase tracking-wider">SANGAT BAIK</div>
                </div>
            </div>
        </div>

        <!-- Kontak & Jam Kerja Box -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 mb-6 border border-gray-100 shadow-sm">
            <h3 class="font-bold text-gray-900 text-sm sm:text-base mb-4">Kontak & Jam Kerja</h3>
            <div class="space-y-3 text-xs text-gray-600">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-base">location_on</span>
                    </div>
                    <span>Jl. Letnan Harun No.1, Kec. {{ $nama_kecamatan }}, Kota Tasikmalaya, Jawa Barat 46151</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-base">mail</span>
                    </div>
                    <span>kec.{{ strtolower(str_replace(' ', '', $nama_kecamatan)) }}@tasikmalayakota.go.id</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-base">schedule</span>
                    </div>
                    <span>Senin - Jumat: 08.00 - 16.00 WIB</span>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="mb-6 relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                <span class="material-symbols-outlined text-lg">search</span>
            </div>
            <input type="text" placeholder="Cari jenis layanan (contoh: Kartu Keluarga, IMB...)" class="w-full bg-[#f0f4fc] border-none rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-200 outline-none">
        </div>

        <!-- Daftar Layanan -->
        <div class="space-y-3">
            @php
                $icons = ['badge', 'family_restroom', 'location_city', 'home_work', 'storefront'];
                $colors = [
                    ['bg' => 'bg-blue-50', 'text' => 'text-blue-600'],
                    ['bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
                    ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
                    ['bg' => 'bg-rose-50', 'text' => 'text-rose-600'],
                    ['bg' => 'bg-indigo-50', 'text' => 'text-indigo-600'],
                ];
            @endphp

            @foreach($layanans as $index => $layanan)
                @php
                    $color = $colors[$index % count($colors)];
                    $icon = $icons[$index % count($icons)];
                @endphp
                
                <a href="{{ route('layanan.detail', $layanan->id_layanan) }}" class="group bg-white rounded-2xl p-4 sm:p-5 flex items-center justify-between border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200">
                    <div class="flex items-center gap-4">
                        <div class="{{ $color['bg'] }} {{ $color['text'] }} w-11 h-11 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl sm:text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $icon }}</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-xs sm:text-sm text-gray-900 group-hover:text-blue-700 transition-colors mb-0.5">{{ $layanan->nama_layanan }}</h3>
                            <p class="text-gray-500 text-[11px] sm:text-xs line-clamp-1">{{ $layanan->produk_pelayanan }}</p>
                        </div>
                    </div>
                    
                    <div class="text-gray-400 group-hover:text-blue-600 transition-colors shrink-0 ml-3">
                        <span class="material-symbols-outlined text-sm sm:text-base">chevron_right</span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Tombol Tampilkan Lebih Banyak -->
        <div class="mt-8 flex justify-center">
            <button class="bg-[#eef2ff] hover:bg-blue-100 text-[#0b53c8] font-semibold text-xs py-2.5 px-6 rounded-full transition flex items-center gap-1.5">
                Tampilkan Lebih Banyak 
                <span class="material-symbols-outlined text-sm">expand_more</span>
            </button>
        </div>
        
    </div>
</div>
@endsection