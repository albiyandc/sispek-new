@extends('layouts.app')

@section('content')
<!-- Hero Section dengan Ambient Dark Gradient -->
<div class="bg-gradient-to-b from-slate-900 via-blue-950 to-slate-900 text-white shadow-2xl relative overflow-hidden -mt-20 pt-20 sm:-mt-24 sm:pt-24">
    <!-- Ambient Glow Effects -->
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 -left-32 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-3 pb-8 sm:py-20 lg:py-24 relative z-10 fade-in-up">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 sm:gap-12">
            
            <!-- Text Content -->
            <div class="w-full md:w-1/2">
                <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white leading-tight mb-3 sm:mb-6 tracking-tight">
                    Layanan Publik <br>
                    <span class="bg-gradient-to-r from-blue-400 via-indigo-300 to-sky-400 bg-clip-text text-transparent">Cepat, Transparan, & Terpadu.</span>
                </h1>
                
                <p class="text-xs sm:text-base text-slate-300 mb-4 sm:mb-8 max-w-lg leading-relaxed font-normal">
                    Kemudahan akses informasi dan standar pelayanan administrasi bagi seluruh warga Kota Tasikmalaya dalam satu sistem terintegrasi.
                </p>

                <!-- Search Bar Hero Glassmorphism (Desktop Only, Mobile uses Navbar Search Bar) -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="hidden sm:flex bg-white/10 backdrop-blur-xl p-2 rounded-2xl border border-white/20 items-center gap-2 mb-8 shadow-2xl focus-within:bg-white focus-within:text-slate-900 group transition-all duration-300">
                    <div class="pl-3 sm:pl-4 text-blue-400 group-focus-within:text-blue-600 shrink-0 transition-colors">
                        <span class="material-symbols-outlined text-2xl">search</span>
                    </div>
                    <input type="text" name="q" placeholder="Cari info pelayanan publik, KTP, IMB, SKTM..." class="flex-1 min-w-0 bg-transparent border-0 focus:ring-0 text-xs sm:text-sm text-white group-focus-within:text-slate-900 placeholder-slate-300 group-focus-within:placeholder-slate-400 py-2.5 sm:py-3 px-2 outline-none font-medium">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white px-5 sm:px-8 py-2.5 sm:py-3 rounded-xl text-xs sm:text-sm font-bold transition shadow-lg shadow-blue-600/30 whitespace-nowrap shrink-0 flex items-center gap-1.5">
                        <span>Cari</span>
                        <span class="material-symbols-outlined text-sm hidden sm:inline">arrow_forward</span>
                    </button>
                </form>

                <!-- Checkmarks -->
                <div class="flex gap-4 sm:gap-6 text-xs text-slate-300 font-medium flex-wrap">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-emerald-400 text-base">check_circle</span> 
                        Terintegrasi SIPPN
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-emerald-400 text-base">check_circle</span> 
                        10 OPD Resmi
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-emerald-400 text-base">check_circle</span> 
                        Transparan & Akuntabel
                    </div>
                </div>
            </div>

            <!-- Image Content Poster (Desktop Only) -->
            <div class="hidden md:flex w-full md:w-1/2 justify-center md:justify-end">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                    <img src="{{ asset('images/main-poster.png') }}"
                         alt="Poster Utama SISPEK"
                         class="relative w-full max-w-md sm:max-w-lg rounded-2xl shadow-2xl border border-white/10 object-cover transform transition duration-500 group-hover:scale-[1.02]">
                </div>
            </div>

        </div>
    </div>
</div>

<!-- 1. Layanan Paling Sering Diakses (Trending) -->
<div id="daftar-layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-12 pb-8 fade-in-up delay-100 scroll-mt-24">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-4 sm:mb-6 gap-4">
        <div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Layanan Publik Populer</h2>
            <p class="text-xs sm:text-base text-slate-500 mt-1">Daftar layanan administrasi dan informasi publik yang paling sering diakses warga.</p>
        </div>
    </div>
    
    <div id="services-grid" class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        @foreach(array_slice($services, 0, 10) as $service)
            <a href="{{ route('layanan.detail', ['id' => $service['id']]) }}" 
               data-id="{{ $service['id'] }}" 
               data-clicks="{{ $service['clicks'] ?? 0 }}" 
               class="service-card group bg-white p-5 sm:p-7 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/5 hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden flex flex-col justify-between">
                
                <div class="flex items-center gap-4 sm:gap-5 mb-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl {{ $service['bg_color'] }} flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined {{ $service['text_color'] }} text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $service['icon'] }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2 mb-1.5">
                            <span class="text-[10px] font-extrabold text-blue-700 bg-blue-50 px-2.5 py-0.5 rounded-full uppercase tracking-wider truncate">{{ str_replace(['Kecamatan ', 'kecamatan ', 'KECAMATAN '], '', $service['kecamatan']) }}</span>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-full">{{ $service['kategori'] }}</span>
                        </div>
                        <h3 class="text-sm sm:text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-1">{{ $service['judul'] }}</h3>
                        <p class="text-xs sm:text-sm text-slate-500 line-clamp-2 leading-relaxed">{{ $service['deskripsi'] }}</p>
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-blue-600 group-hover:text-blue-700">
                    <span>Lihat Persyaratan & Standar Layanan</span>
                    <span class="material-symbols-outlined text-base group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                </div>
            </a>
        @endforeach
    </div>
</div>

<!-- 2. Sektor Pelayanan Publik -->
<div id="sektor-layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 fade-in-up delay-150 scroll-mt-24 border-t border-slate-200/60">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-4 sm:mb-6 gap-4">
        <div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Sektor Pelayanan Publik</h2>
            <p class="text-xs sm:text-base text-slate-500 mt-1">Pilih sektor pelayanan untuk melihat daftar layanan dan daerah penyelenggaranya.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
        @foreach($sektors as $sektor)
        <a href="{{ route('sektor.show', $sektor['slug']) }}" class="group bg-white p-6 sm:p-7 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-500/5 hover:-translate-y-1.5 transition-all duration-300 flex items-center gap-5 relative overflow-hidden">
            <div class="w-14 h-14 rounded-2xl {{ $sektor['bg_color'] }} flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-sm">
                <span class="material-symbols-outlined {{ $sektor['text_color'] }} text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $sektor['icon'] }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1.5 group-hover:text-blue-600 transition-colors leading-snug">{{ $sektor['nama'] }}</h3>
                <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed mb-4">{{ $sektor['deskripsi'] }}</p>
                <div class="text-blue-600 text-xs font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                    <span>Jelajahi Sektor</span>
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Tombol Lihat Semua Sektor -->
    <div class="mt-6 sm:mt-8 flex justify-center">
        <a href="{{ route('sektor.semua') }}" class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white font-bold text-xs sm:text-sm py-3.5 px-8 rounded-full shadow-md hover:shadow-xl hover:scale-[1.02] transition-all flex items-center gap-2 group">
            <span>Lihat Semua Sektor Pelayanan</span>
            <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
    </div>
</div>

<!-- Stats Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10 sm:pb-12 fade-in-up delay-200">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 divide-x-0 md:divide-x divide-slate-100 text-center">
            <div class="p-2">
                <div class="text-3xl sm:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-1">10</div>
                <div class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest">Kecamatan</div>
            </div>
            <div class="p-2">
                <div class="text-3xl sm:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-1">295+</div>
                <div class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest">Master Layanan</div>
            </div>
            <div class="p-2">
                <div class="text-3xl sm:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-1">100%</div>
                <div class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest">Transparansi Syarat</div>
            </div>
            <div class="p-2">
                <div class="text-3xl sm:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-1">24/7</div>
                <div class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest">Akses Portal</div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.service-card').forEach(function (card) {
        card.addEventListener('click', function (e) {
            const id = card.dataset.id;
            if (!id) return;
            // Fire-and-forget: track click then navigate
            const dest = card.getAttribute('href');
            e.preventDefault();
            fetch(`/api/track-click/${id}`, { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '' } })
                .finally(function () {
                    window.location.href = dest;
                });
        });
    });
});
</script>
@endsection