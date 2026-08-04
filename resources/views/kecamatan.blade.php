@extends('layouts.app')

@section('content')
<!-- Background Abu-abu Muda persis gambar -->
<div class="bg-[#f8f9fc] min-h-screen pb-16 pt-8" x-data="{ search: '', limit: 4, total: {{ count($layanans) }} }">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-xs text-gray-500 mb-6 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="#" class="hover:text-blue-600 transition">Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            <span class="font-semibold text-gray-800">Kecamatan {{ $nama_kecamatan }}</span>
        </div>

        <!-- Banner Biru -->
        <div class="bg-[#0b53c8] text-white rounded-3xl p-10 lg:p-14 mb-8 shadow-lg relative overflow-hidden">
            <!-- Elemen Dekoratif Banner -->
            <div class="absolute top-0 right-0 opacity-10">
                <svg width="300" height="300" viewBox="0 0 100 100" fill="currentColor"><circle cx="50" cy="50" r="50"/></svg>
            </div>
            <div class="relative z-10">
                <h1 class="text-3xl lg:text-4xl font-bold mb-4">Layanan Publik Kecamatan {{ $nama_kecamatan }}</h1>
                <p class="text-blue-100 max-w-2xl text-lg leading-relaxed">
                    Akses cepat layanan administrasi, perizinan, dan kependudukan resmi untuk seluruh warga Kecamatan {{ $nama_kecamatan }}, Kota Tasikmalaya.
                </p>
            </div>
        </div>

        <!-- Search Bar Besar -->
        <div class="mb-10 relative group transform transition hover:-translate-y-1 hover:shadow-lg duration-300 rounded-2xl">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-blue-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" x-model="search" placeholder="Cari jenis layanan (contoh: Kartu Keluarga, KTP-el, IUMK...)" class="w-full border-none rounded-2xl py-5 pl-14 pr-6 bg-white shadow-sm text-gray-700 font-medium focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all text-lg">
        </div>

        <!-- Daftar Layanan (Iterasi dengan array warna untuk Icon) -->
        <div class="space-y-4">
            @php
                $colors = [
                    ['bg' => 'bg-blue-50', 'text' => 'text-blue-600'],
                    ['bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
                    ['bg' => 'bg-green-50', 'text' => 'text-green-600'],
                    ['bg' => 'bg-red-50', 'text' => 'text-red-600'],
                ];
            @endphp

            @foreach($layanans as $index => $layanan)
                @php
                    $color = $colors[$index % count($colors)];
                @endphp
                
                <a href="{{ route('layanan.detail', ['id' => $layanan->id_layanan, 'kecamatan' => $nama_kecamatan]) }}" 
                   x-show="search === '' ? {{ $index }} < limit : ('{{ strtolower($layanan->nama_layanan . ' ' . $layanan->produk_pelayanan) }}').includes(search.toLowerCase())"
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="opacity-0 transform translate-y-2"
                   x-transition:enter-end="opacity-100 transform translate-y-0"
                   class="block bg-white rounded-2xl p-6 flex justify-between items-center hover:shadow-md hover:-translate-y-1 transition-all duration-300 group border border-transparent hover:border-blue-100">
                    <div class="flex items-start gap-6">
                        <!-- Icon Box Berwarna -->
                        <div class="{{ $color['bg'] }} {{ $color['text'] }} w-14 h-14 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-blue-700 transition-colors">{{ $layanan->nama_layanan }}</h3>
                            <p class="text-gray-500 text-sm mt-1.5 leading-relaxed">{{ Str::limit($layanan->produk_pelayanan, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="text-gray-300 group-hover:text-blue-500 transition-colors shrink-0 ml-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Tombol Tampilkan Lebih Banyak / Lebih Sedikit -->
        <div class="mt-10 flex justify-center" x-show="search === ''">
            <button @click="limit = (limit >= total ? 4 : total)" class="bg-[#eef2ff] hover:bg-blue-100 text-blue-700 font-semibold py-3 px-8 rounded-full transition flex items-center gap-2 shadow-sm hover:shadow">
                <span x-text="limit >= total ? 'Tampilkan Lebih Sedikit' : 'Tampilkan Lebih Banyak'">Tampilkan Lebih Banyak</span> 
                <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': limit >= total }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
        
    </div>
</div>
@endsection