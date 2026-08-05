@extends('layouts.app')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen pb-20 pt-0 sm:pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb (Hidden on Mobile) -->
        <div class="hidden sm:flex text-xs text-slate-400 mb-6 items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="{{ route('layanan.semua') }}" class="hover:text-blue-600 transition-colors">Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-slate-800">{{ str_starts_with(strtolower(trim($nama_kecamatan)), 'kecamatan') ? $nama_kecamatan : 'Kecamatan '.$nama_kecamatan }}</span>
        </div>

        <!-- Banner Blue Ambient Full Width -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white -mx-4 sm:mx-0 -mt-8 sm:mt-0 pt-24 sm:pt-10 p-8 sm:p-10 mb-8 rounded-none sm:rounded-3xl shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10 max-w-3xl">
                <h1 class="text-2xl sm:text-4xl font-extrabold mb-3 tracking-tight">Pelayanan Publik Kecamatan {{ $nama_kecamatan }}</h1>
                <p class="text-slate-300 max-w-2xl text-xs sm:text-sm leading-relaxed">
                    Pusat standar informasi pelayanan publik digital dan perizinan resmi warga Kecamatan {{ $nama_kecamatan }}, Kota Tasikmalaya.
                </p>
            </div>
        </div>

        <!-- Maklumat Pelayanan Card (Selalu di atas IKM) -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 mb-8 relative overflow-hidden border border-slate-100 shadow-sm">
            <div class="absolute top-2 right-4 text-slate-100 text-8xl font-serif select-none pointer-events-none">”</div>
            <div class="relative z-10">
                <div class="text-[10px] font-extrabold text-blue-600 tracking-widest uppercase mb-2">MAKLUMAT PELAYANAN</div>
                <p class="text-slate-700 text-xs sm:text-sm italic font-medium leading-relaxed mb-6 pr-8">
                    "Dengan ini, kami menyatakan sanggup menyelenggarakan pelayanan sesuai standar pelayanan yang telah ditetapkan dan apabila tidak menepati janji ini, kami siap menerima sanksi sesuai peraturan perundang-undangan yang berlaku."
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-md">
                        {{ substr($nama_kecamatan, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Camat {{ $nama_kecamatan }}</div>
                        <div class="text-[10px] text-slate-400">Pemerintah Kota Tasikmalaya</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2-Column Grid Layout (Wide Desktop) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Search & Service Cards (2 Cols) -->
            <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">

                <!-- Search Bar -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <span class="material-symbols-outlined text-xl">search</span>
                    </div>
                    <input id="search-service-input" type="text" placeholder="Cari jenis pelayanan (contoh: Kartu Keluarga, SKU, Domisili...)" class="w-full bg-white border border-slate-200/80 rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 outline-none shadow-sm transition-all font-medium">
                </div>

                <!-- Service List Grid 2-Column Cards -->
                <div id="service-list-container" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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
                            $isExtra = $index >= 10;
                        @endphp
                        
                        <a href="{{ route('layanan.detail', $layanan->id_layanan) }}" 
                           data-title="{{ $layanan->nama_layanan }}" 
                           data-desc="{{ $layanan->produk_pelayanan }}" 
                           class="service-item {{ $isExtra ? 'extra-service-item hidden' : '' }} group bg-white rounded-3xl p-5 flex flex-col justify-between border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-200 hover:-translate-y-1 transition-all duration-200">
                            <div class="flex items-start gap-3.5 mb-3">
                                <div class="{{ $color['bg'] }} {{ $color['text'] }} w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform shadow-sm">
                                    <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">{{ $icon }}</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-bold text-xs sm:text-sm text-slate-900 group-hover:text-blue-600 transition-colors mb-1 line-clamp-1">{{ $layanan->nama_layanan }}</h3>
                                    <p class="text-slate-500 text-[11px] line-clamp-2 leading-relaxed">{{ $layanan->produk_pelayanan }}</p>
                                </div>
                            </div>
                            
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] font-bold text-blue-600 group-hover:text-blue-700">
                                <span>Lihat Syarat</span>
                                <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Tombol Tampilkan Lebih Banyak -->
                @if(count($layanans) > 10)
                <div class="mt-8 flex justify-center">
                    <button id="btn-show-more" class="bg-white border border-slate-200 hover:bg-blue-50 text-blue-700 font-bold text-xs py-3 px-8 rounded-full shadow-sm hover:shadow-md transition-all flex items-center gap-2">
                        <span>Tampilkan Lebih Banyak Layanan</span> 
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </button>
                </div>
                @endif

            </div>

            <!-- Right Sidebar Column (1 Col) -->
            <div class="space-y-6 order-1 lg:order-2">
                
                <!-- Indeks Kepuasan Masyarakat (IKM) Card -->
                <div class="bg-gradient-to-br from-blue-50/90 to-indigo-50/60 rounded-3xl p-6 border border-blue-100/60 shadow-sm space-y-4">
                    <div>
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">Indeks Kepuasan (IKM)</div>
                        <div class="text-[10px] text-slate-500">Mutu pelayanan publik warga</div>
                    </div>

                    <div class="flex items-center gap-3 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm justify-around">
                        <div class="text-center pr-3 border-r border-slate-100">
                            <div class="text-2xl font-extrabold text-blue-600">88.35</div>
                            <div class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">SKOR IKM</div>
                        </div>
                        <div class="text-center pl-1">
                            <div class="text-sm font-extrabold text-emerald-600">Kategori A</div>
                            <div class="text-[9px] font-bold text-emerald-600 uppercase tracking-widest">SANGAT BAIK</div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Kontak Card -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-4">
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base flex items-center gap-2 pb-2 border-b border-slate-100">
                        <span class="material-symbols-outlined text-blue-600 text-lg">info</span>
                        Informasi Kontak & Jam Kerja
                    </h3>
                    
                    <div class="space-y-3 text-xs text-slate-600">
                        <div class="flex items-start gap-3 p-3 rounded-2xl bg-slate-50">
                            <span class="material-symbols-outlined text-blue-600 text-lg shrink-0 mt-0.5">location_on</span>
                            <span>Jl. Letnan Harun No.1, Kec. {{ $nama_kecamatan }}, Tasikmalaya 46151</span>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-2xl bg-slate-50">
                            <span class="material-symbols-outlined text-blue-600 text-lg shrink-0 mt-0.5">mail</span>
                            <span class="break-all font-medium">kec.{{ strtolower(str_replace(' ', '', $nama_kecamatan)) }}@tasikmalayakota.go.id</span>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-2xl bg-slate-50">
                            <span class="material-symbols-outlined text-blue-600 text-lg shrink-0 mt-0.5">schedule</span>
                            <span>Senin - Jumat: <br><strong class="text-slate-800">08.00 - 16.00 WIB</strong></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btnShowMore = document.getElementById('btn-show-more');
    const searchInput = document.getElementById('search-service-input');
    const items = document.querySelectorAll('.service-item');

    if (btnShowMore) {
        btnShowMore.addEventListener('click', () => {
            const extraItems = document.querySelectorAll('.extra-service-item');
            extraItems.forEach(item => item.classList.remove('hidden'));
            btnShowMore.classList.add('hidden');
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            items.forEach(item => {
                const title = (item.getAttribute('data-title') || '').toLowerCase();
                const desc = (item.getAttribute('data-desc') || '').toLowerCase();
                if (title.includes(query) || desc.includes(query)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
            if (query !== '' && btnShowMore) {
                btnShowMore.classList.add('hidden');
            }
        });
    }
});
</script>
@endsection