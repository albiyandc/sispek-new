@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-blue-50/50 via-white to-white overflow-hidden rounded-b-[40px] border-b border-slate-100 shadow-sm">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 lg:py-20 fade-in-up">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8 lg:gap-12">
            
            <!-- Text Content -->
            <div class="w-full md:w-1/2">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-[10px] sm:text-xs font-bold bg-blue-50 text-[#0b53c8] border border-blue-100/60 mb-4 sm:mb-6 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#0b53c8] animate-pulse"></span> 
                    PORTAL RESMI KOTA TASIKMALAYA
                </span>

                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black text-slate-900 leading-[1.15] mb-3 sm:mb-5 tracking-tight">
                    Selamat Datang di <br><span class="text-[#0b53c8] bg-gradient-to-r from-[#0b53c8] to-indigo-600 bg-clip-text text-transparent">SISPEK</span> Tasikmalaya!
                </h1>
                
                <p class="text-xs sm:text-base text-slate-500 mb-6 sm:mb-8 max-w-lg leading-relaxed font-normal">
                    Sistem Informasi Standar Pelayanan Elektronik terpadu satu pintu untuk mewujudkan kemudahan akses layanan masyarakat Kota Tasikmalaya.
                </p>

                <!-- Search Bar Hero -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="bg-white p-2 rounded-2xl shadow-xl shadow-blue-900/5 border border-slate-100 flex items-center gap-2 mb-6 sm:mb-8 hover:border-blue-200 transition-all">
                    <div class="pl-3 sm:pl-4 text-[#0b53c8] flex items-center">
                        <span class="material-symbols-outlined text-xl sm:text-2xl">search</span>
                    </div>
                    <input type="text" name="q" placeholder="Cari info pelayanan publik..." class="flex-1 bg-transparent border-0 focus:ring-0 text-xs sm:text-sm text-slate-700 placeholder-slate-400 py-2 sm:py-2.5 px-2 w-full outline-none">
                    <button type="submit" class="bg-[#0b53c8] hover:bg-blue-800 text-white px-5 sm:px-8 py-2.5 sm:py-3 rounded-xl text-xs sm:text-sm font-bold transition-all shadow-md shadow-blue-600/20 whitespace-nowrap">
                        Cari Sekarang
                    </button>
                </form>

                <!-- Checkmarks -->
                <div class="flex gap-4 sm:gap-6 text-[10px] sm:text-xs text-slate-600 font-semibold flex-wrap">
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span> 
                        Terintegrasi
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span> 
                        Transparan
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span> 
                        Akuntabel
                    </div>
                </div>
            </div>

            <!-- Image Content -->
            <div class="w-full md:w-1/2 flex justify-center md:justify-end">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl opacity-10 blur-2xl"></div>
                    <img src="{{ asset('images/main-poster.png') }}"
                         alt="Main Poster"
                         class="relative w-full max-w-md sm:max-w-lg rounded-2xl shadow-xl shadow-slate-200 border border-white transform transition duration-500 hover:scale-[1.02]"
                         style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Daftar Layanan Publik -->
<div id="daftar-layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 fade-in-up delay-100 scroll-mt-24">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4 sm:gap-6">
        <div class="max-w-xl text-center sm:text-left">
            <h2 class="text-xl sm:text-3xl font-extrabold text-slate-900 mb-2 sm:mb-3 tracking-tight">Layanan Publik di Kota Tasikmalaya</h2>
            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">Temukan berbagai layanan administrasi kependudukan, perizinan, dan informasi publik yang tersedia di setiap kecamatan.</p>
        </div>
    </div>
    
    <div id="services-grid" class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        @foreach($services as $service)
            <a href="{{ route('kategori.track', ['id' => $service['id'], 'kategori' => $service['kategori_slug']]) }}" 
               data-id="{{ $service['id'] }}" 
               data-clicks="{{ $service['clicks'] ?? 0 }}" 
               class="service-card group bg-white p-5 sm:p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-200 hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-start gap-4 sm:gap-5">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl {{ $service['bg_color'] }} flex items-center justify-center shrink-0 shadow-inner group-hover:scale-105 transition-transform">
                        <span class="material-symbols-outlined {{ $service['text_color'] }} text-2xl sm:text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $service['icon'] }}</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="text-[10px] sm:text-xs font-extrabold text-emerald-700 uppercase tracking-tight">{{ $service['kecamatan'] }}</span>
                            <span class="bg-blue-50 text-[#0b53c8] text-[9px] sm:text-[10px] px-2.5 py-0.5 rounded-full font-bold border border-blue-100/50">{{ $service['kategori'] }}</span>
                        </div>
                        <h4 class="text-sm sm:text-base font-bold text-slate-900 mb-1 sm:mb-1.5 group-hover:text-[#0b53c8] transition-colors leading-snug">{{ $service['judul'] }}</h4>
                        <p class="text-xs text-slate-500 line-clamp-2 mb-3 sm:mb-4 leading-relaxed">{{ $service['deskripsi'] }}</p>
                        <div class="text-[#0b53c8] text-xs font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                            Ajukan Layanan <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </div>
                    </div>
                </div>
            </a>
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