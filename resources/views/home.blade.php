@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden rounded-b-[40px] shadow-sm">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-20 lg:py-24 fade-in-up">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 sm:gap-12">
            
            <!-- Text Content -->
            <div class="w-full md:w-1/2">
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-3 sm:mb-6 tracking-tight">
                    Selamat Datang di <br><span class="text-[#1e3a8a]">SISPEK</span> <span>Tasikmalaya!</span>
                </h1>
                
                <p class="text-xs sm:text-lg text-gray-500 mb-6 sm:mb-8 max-w-lg leading-relaxed">
                    Sistem informasi standar pelayanan elektronik satu pintu untuk masyarakat Kota Tasikmalaya.
                </p>

                <!-- Search Bar Hero -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="bg-white p-2 rounded-xl sm:rounded-2xl shadow-lg border border-gray-100 flex items-center gap-2 mb-6 sm:mb-8">
                    <div class="pl-2 sm:pl-4 text-[#1e3a8a] shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="q" placeholder="Pencarian Layanan, Berita dan Informasi" class="flex-1 min-w-0 bg-transparent border-0 focus:ring-0 text-xs sm:text-sm text-gray-700 placeholder-gray-400 py-2 sm:py-3 px-2 outline-none">
                    <button type="submit" class="bg-[#003da5] hover:bg-blue-800 text-white px-3 sm:px-8 py-2 sm:py-3 rounded-lg sm:rounded-xl text-xs sm:text-sm font-semibold transition shadow-md whitespace-nowrap shrink-0">
                        Cari
                    </button>
                </form>

                <!-- Checkmarks -->
                <div class="flex gap-3 sm:gap-6 text-xs sm:text-sm text-gray-700 font-medium flex-wrap">
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> 
                        Terintegrasi
                    </div>
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> 
                        Transparan
                    </div>
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> 
                        Akuntabel
                    </div>
                </div>
            </div>

            <!-- Image Content -->
            <div class="w-full md:w-1/2 flex justify-center md:justify-end">
                <img src="{{ asset('images/main-poster.png') }}"
                     alt="Main Poster"
                     class="w-full max-w-lg rounded-xl sm:rounded-2xl transform transition duration-500 hover:scale-105"
                     style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>

<!-- 1. Layanan Paling Sering Diakses (Populer) -->
<div id="daftar-layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 sm:pt-20 pb-8 fade-in-up delay-100 scroll-mt-24">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4 sm:gap-6">
        <div class="max-w-xl text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">Layanan Paling Sering Diakses</h2>
            <p class="text-[11px] sm:text-base text-gray-500">Akses cepat 10 layanan publik terpopuler yang paling banyak diakses oleh masyarakat Kota Tasikmalaya.</p>
        </div>
    </div>
    
    <div id="services-grid" class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        @foreach($services as $service)
            <a href="{{ route('layanan.detail', ['id' => $service['id']]) }}" 
               data-id="{{ $service['id'] }}" 
               data-clicks="{{ $service['clicks'] ?? 0 }}" 
               class="service-card group bg-white p-4 sm:p-6 rounded-2xl border border-gray-100 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
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
                            Lihat Persyaratan <span class="material-symbols-outlined text-xs sm:text-sm">chevron_right</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<!-- 2. Sektor Pelayanan Publik -->
<div id="sektor-layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 fade-in-up delay-150 scroll-mt-24 border-t border-gray-100">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4 sm:gap-6">
        <div class="max-w-xl text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">Sektor Pelayanan Publik</h2>
            <p class="text-[11px] sm:text-base text-gray-500">Pilih sektor bidang pelayanan untuk mencari jenis layanan serta daerah/kecamatan yang menyediakannya.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @foreach($sektors as $sektor)
        <a href="{{ route('sektor.show', $sektor['slug']) }}" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-start gap-5">
            <div class="w-14 h-14 rounded-xl {{ $sektor['bg_color'] }} flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <span class="material-symbols-outlined {{ $sektor['text_color'] }} text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $sektor['icon'] }}</span>
            </div>
            <div class="flex-1">
                <h4 class="text-base sm:text-lg font-bold text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">{{ $sektor['nama'] }}</h4>
                <p class="text-xs text-gray-500 line-clamp-2 mb-3 leading-relaxed">{{ $sektor['deskripsi'] }}</p>
                <div class="text-[#1e3a8a] text-xs font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                    Lihat Layanan <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Tombol Lihat Semua Sektor -->
    <div class="mt-8 sm:mt-12 flex justify-center">
        <a href="{{ route('sektor.semua') }}" class="bg-white border border-gray-200 text-blue-700 hover:bg-blue-50 font-medium text-xs sm:text-sm py-2 px-6 sm:py-3 sm:px-8 rounded-full shadow-sm transition flex items-center gap-2">
            Lihat Semua Sektor <span class="material-symbols-outlined text-sm sm:text-base">arrow_forward</span>
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
                <div class="text-lg sm:text-4xl lg:text-5xl font-light text-[#1e3a8a] mb-0.5 sm:mb-2">98%</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Kepuasan Publik</div>
            </div>
            <div class="px-1 sm:px-4">
                <div class="text-lg sm:text-4xl lg:text-5xl font-light text-[#1e3a8a] mb-0.5 sm:mb-2">24/7</div>
                <div class="text-[7px] sm:text-xs font-bold text-gray-500 tracking-wider uppercase">Akses Online</div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('services-grid');
    if (!container) return;

    let localClicks = JSON.parse(localStorage.getItem('service_clicks') || '{}');

    function sortAndRender() {
        const cards = Array.from(container.querySelectorAll('.service-card'));
        cards.sort((a, b) => {
            const idA = a.getAttribute('data-id');
            const idB = b.getAttribute('data-id');
            const clicksA = (localClicks[idA] !== undefined) ? localClicks[idA] : parseInt(a.getAttribute('data-clicks') || '0');
            const clicksB = (localClicks[idB] !== undefined) ? localClicks[idB] : parseInt(b.getAttribute('data-clicks') || '0');
            return clicksB - clicksA;
        });

        cards.forEach((card, index) => {
            container.appendChild(card);
            if (index < 10) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    sortAndRender();

    window.addEventListener('pageshow', () => {
        localClicks = JSON.parse(localStorage.getItem('service_clicks') || '{}');
        sortAndRender();
    });

    container.addEventListener('click', (e) => {
        const card = e.target.closest('.service-card');
        if (!card) return;

        e.preventDefault();
        const id = card.getAttribute('data-id');
        const targetUrl = card.getAttribute('href');

        const currentClicks = (localClicks[id] !== undefined) ? localClicks[id] : parseInt(card.getAttribute('data-clicks') || '0');
        localClicks[id] = currentClicks + 1;
        localStorage.setItem('service_clicks', JSON.stringify(localClicks));
        card.setAttribute('data-clicks', localClicks[id]);

        sortAndRender();

        setTimeout(() => {
            window.location.href = targetUrl;
        }, 150);
    });
});
</script>
@endsection