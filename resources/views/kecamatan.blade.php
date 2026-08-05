@extends('layouts.app')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen pb-20 pt-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb -->
        <div class="text-xs text-slate-400 mb-6 flex items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a> 
            <span>&rsaquo;</span> 
            <span>Pelayanan Publik</span> 
            <span>&rsaquo;</span> 
            <span class="font-bold text-slate-800">Kecamatan {{ $nama_kecamatan }}</span>
        </div>

        <!-- Banner Blue Ambient -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white rounded-3xl p-8 sm:p-10 mb-8 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-400/10 border border-blue-400/20 text-blue-300 text-[11px] font-bold uppercase tracking-wider mb-3">
                    <span class="material-symbols-outlined text-sm">location_city</span>
                    Pemerintah Kecamatan
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold mb-3 tracking-tight">Pelayanan Publik Kecamatan {{ $nama_kecamatan }}</h1>
                <p class="text-slate-300 max-w-2xl text-xs sm:text-sm leading-relaxed">
                    Pusat standar informasi pelayanan publik digital dan perizinan resmi warga Kecamatan {{ $nama_kecamatan }}, Kota Tasikmalaya.
                </p>
            </div>
        </div>

        <!-- Maklumat Pelayanan Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 mb-6 relative overflow-hidden border border-slate-100 shadow-sm">
            <div class="absolute top-0 left-0 w-2 h-full bg-blue-600"></div>
            <div class="absolute top-2 right-4 text-slate-100 text-8xl font-serif select-none pointer-events-none">”</div>
            <div class="relative z-10 pl-2">
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

        <!-- Indeks Kepuasan Masyarakat (IKM) Card -->
        <div class="bg-gradient-to-r from-blue-50/80 to-indigo-50/50 rounded-3xl p-5 sm:p-6 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4 border border-blue-100/60 shadow-sm">
            <div class="flex items-center gap-3.5 w-full sm:w-auto">
                <div class="w-11 h-11 rounded-2xl bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-md">
                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">sentiment_satisfied</span>
                </div>
                <div>
                    <div class="font-bold text-slate-900 text-xs sm:text-sm">Indeks Kepuasan Masyarakat (IKM)</div>
                    <div class="text-[11px] text-slate-500">Penilaian masyarakat terhadap mutu pelayanan</div>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-5 py-2.5 rounded-2xl border border-slate-100 shadow-sm w-full sm:w-auto justify-around sm:justify-start">
                <div class="text-center pr-4 border-r border-slate-100">
                    <div class="text-xl font-extrabold text-blue-600">88.35</div>
                    <div class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">SKOR IKM</div>
                </div>
                <div class="text-center pl-1">
                    <div class="text-xs font-extrabold text-emerald-600">Kategori A</div>
                    <div class="text-[9px] font-bold text-emerald-600 uppercase tracking-widest">SANGAT BAIK</div>
                </div>
            </div>
        </div>

        <!-- Informasi Kontak Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 mb-8 border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-blue-600 text-lg">info</span>
                Informasi Kontak & Jam Pelayanan
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs text-slate-600">
                <div class="flex items-start gap-3 p-3 rounded-2xl bg-slate-50">
                    <span class="material-symbols-outlined text-blue-600 text-lg shrink-0 mt-0.5">location_on</span>
                    <span>Jl. Letnan Harun No.1, Kec. {{ $nama_kecamatan }}, Tasikmalaya 46151</span>
                </div>
                <div class="flex items-start gap-3 p-3 rounded-2xl bg-slate-50">
                    <span class="material-symbols-outlined text-blue-600 text-lg shrink-0 mt-0.5">mail</span>
                    <span class="break-all">kec.{{ strtolower(str_replace(' ', '', $nama_kecamatan)) }}@tasikmalayakota.go.id</span>
                </div>
                <div class="flex items-start gap-3 p-3 rounded-2xl bg-slate-50">
                    <span class="material-symbols-outlined text-blue-600 text-lg shrink-0 mt-0.5">schedule</span>
                    <span>Senin - Jumat: <br><strong class="text-slate-800">08.00 - 16.00 WIB</strong></span>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="mb-6 relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                <span class="material-symbols-outlined text-xl">search</span>
            </div>
            <input id="search-service-input" type="text" placeholder="Cari jenis pelayanan (contoh: Kartu Keluarga, SKU, Domisili...)" class="w-full bg-white border border-slate-200/80 rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none shadow-sm transition-all">
        </div>

        <!-- Service List Grid -->
        <div id="service-list-container" class="space-y-3">
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
                   class="service-item {{ $isExtra ? 'extra-service-item hidden' : '' }} group bg-white rounded-2xl p-4 sm:p-5 flex items-center justify-between border border-slate-100 shadow-sm hover:shadow-lg hover:border-blue-200 hover:-translate-y-0.5 transition-all duration-200">
                    <div class="flex items-center gap-4">
                        <div class="{{ $color['bg'] }} {{ $color['text'] }} w-11 h-11 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-xl sm:text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $icon }}</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-xs sm:text-sm text-slate-900 group-hover:text-blue-600 transition-colors mb-0.5">{{ $layanan->nama_layanan }}</h3>
                            <p class="text-slate-500 text-[11px] sm:text-xs line-clamp-1 leading-relaxed">{{ $layanan->produk_pelayanan }}</p>
                        </div>
                    </div>
                    
                    <div class="text-slate-400 group-hover:text-blue-600 transition-colors shrink-0 ml-3">
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