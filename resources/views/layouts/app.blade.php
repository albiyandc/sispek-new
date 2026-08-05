<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISPEK Tasikmalaya — Portal Standar Pelayanan Publik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; overflow-x: hidden; }
        .fade-in-up { animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; transform: translateY(20px); }
        .delay-100 { animation-delay: 100ms; }
        .delay-150 { animation-delay: 150ms; }
        .delay-200 { animation-delay: 200ms; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
    </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen selection:bg-blue-600 selection:text-white">

    <!-- Ultra-Modern Floating Glass Navbar -->
    <header class="sticky top-0 sm:top-3 z-50 px-2 sm:px-4 transition-all duration-300">
        <nav class="max-w-7xl mx-auto rounded-2xl sm:rounded-full px-4 sm:px-6 py-2.5 transition-all duration-300" 
             x-data="{ 
                 openNav: false, 
                 isScrolled: false, 
                 isHome: {{ request()->routeIs('home') ? 'true' : 'false' }},
                 isMobile: window.innerWidth < 768,
                 get isTransparent() {
                     return !this.isScrolled && (this.isHome || this.isMobile);
                 }
             }"
             @resize.window="isMobile = window.innerWidth < 768"
             @scroll.window="isScrolled = (window.pageYOffset > 50)"
             :class="isTransparent ? 'bg-transparent border border-transparent shadow-none' : 'bg-white/90 backdrop-blur-2xl border border-white/80 shadow-[0_10px_35px_rgba(15,23,42,0.08)]'">
            <div class="flex justify-between items-center gap-2 sm:gap-6">
                
                <!-- Logo Brand -->
                <div class="flex items-center gap-3 cursor-pointer shrink-0 group py-1" onclick="window.location.href='{{ route('home') }}'">
                    <img src="{{ asset('images/logo_sispek_tasikmalaya.png') }}" alt="SISPEK Tasikmalaya" class="h-7 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </div>

                <!-- Search Bar (Desktop) -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="hidden md:flex flex-1 max-w-md lg:max-w-lg px-2">
                    <div class="relative w-full group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors"
                             :class="(!isScrolled && isHome) ? 'text-slate-300 group-focus-within:text-blue-400' : 'text-slate-400 group-focus-within:text-blue-600'">
                            <span class="material-symbols-outlined text-xl">search</span>
                        </div>
                        <input type="text" name="q" placeholder="Cari info pelayanan publik, KTP, izin usaha..." 
                               class="w-full pl-11 pr-10 py-2.5 rounded-full text-xs sm:text-sm font-medium focus:outline-none focus:ring-4 transition-all"
                               :class="(!isScrolled && isHome) ? 'bg-white/10 hover:bg-white/20 border border-white/20 text-white placeholder-slate-300 focus:bg-white focus:text-slate-800 focus:ring-white/20' : 'bg-slate-100/70 hover:bg-slate-100/90 border border-slate-200/60 text-slate-800 placeholder-slate-400 focus:bg-white focus:border-blue-600 focus:ring-blue-500/10 shadow-inner'">
                        <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
                            <span class="text-[10px] font-bold px-1.5 py-0.5 rounded-md border"
                                  :class="(!isScrolled && isHome) ? 'bg-white/20 text-slate-200 border-white/20' : 'bg-white/80 text-slate-400 border-slate-200/80 shadow-2xs'">⌘K</span>
                        </div>
                    </div>
                </form>

                <!-- Search Bar (Mobile Input Pill) -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="md:hidden flex-1 max-w-[170px] xs:max-w-[210px] sm:max-w-xs ml-auto">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none transition-colors"
                             :class="!isScrolled ? 'text-slate-300' : 'text-slate-400'">
                            <span class="material-symbols-outlined text-base">search</span>
                        </div>
                        <input type="text" name="q" placeholder="Cari info..." 
                               class="w-full pl-8 pr-3 py-1.5 rounded-full text-xs font-medium focus:outline-none transition-all"
                               :class="!isScrolled ? 'bg-white/10 hover:bg-white/20 border border-white/20 text-white placeholder-slate-300 focus:bg-white focus:text-slate-800' : 'bg-slate-100/70 border border-slate-200/60 text-slate-800 placeholder-slate-400 focus:bg-white'">
                    </div>
                </form>

                <!-- Right Menu Nav (Desktop) -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2 text-xs sm:text-sm font-bold shrink-0">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full transition-all duration-200 relative"
                       :class="(!isScrolled && isHome) ? 'text-blue-300 font-extrabold bg-blue-500/20' : '{{ request()->routeIs('home') ? 'text-blue-600 font-extrabold bg-blue-50/70' : 'hover:bg-slate-100/80 text-slate-700 hover:text-blue-600' }}'">Beranda</a>
                    
                    <a href="{{ route('sektor.semua') }}" class="px-4 py-2 rounded-full transition-all duration-200 relative"
                       :class="(!isScrolled && isHome) ? 'text-slate-200 hover:text-white hover:bg-white/10' : '{{ request()->routeIs('sektor.*') ? 'text-blue-600 font-extrabold bg-blue-50/70' : 'hover:bg-slate-100/80 text-slate-700 hover:text-blue-600' }}'">Sektor</a>
                    
                    <a href="{{ route('layanan.semua') }}" class="px-4 py-2 rounded-full transition-all duration-200 relative"
                       :class="(!isScrolled && isHome) ? 'text-slate-200 hover:text-white hover:bg-white/10' : '{{ request()->routeIs('layanan.semua') ? 'text-blue-600 font-extrabold bg-blue-50/70' : 'hover:bg-slate-100/80 text-slate-700 hover:text-blue-600' }}'">Semua Layanan</a>
                    
                    <!-- Dropdown Kecamatan Grid 2-Kolom -->
                    <div x-data="{ openKecamatan: false }" class="relative" @click.away="openKecamatan = false" @mouseenter="openKecamatan = true" @mouseleave="openKecamatan = false">
                        @php
                            $activeKecName = $nama_kecamatan ?? request()->route('nama_kecamatan') ?? ($layanan->nama_kecamatan ?? null);
                        @endphp
                        <button class="flex items-center gap-1 px-4 py-2 rounded-full transition-all duration-200 outline-none font-bold"
                                :class="(!isScrolled && isHome) ? 'text-slate-200 hover:text-white hover:bg-white/10' : '{{ request()->routeIs('kecamatan.*') || !empty($activeKecName) ? 'text-blue-600 font-extrabold bg-blue-50/70' : 'hover:bg-slate-100/80 text-slate-700 hover:text-blue-600' }}'">
                            <span>OPD</span>
                            <span class="material-symbols-outlined text-lg transition-transform duration-200" :class="{ 'rotate-180 text-blue-600': openKecamatan }">expand_more</span>
                        </button>

                        <div x-show="openKecamatan" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95" class="absolute top-full right-0 mt-3 w-80 bg-white/95 backdrop-blur-2xl border border-slate-100 rounded-3xl shadow-2xl p-3 z-50 text-slate-700" style="display: none;">
                            <div class="px-3 py-2 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest border-b border-slate-100 mb-2 flex items-center">
                                <span>Pilih OPD</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1">
                                @php
                                    $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                                    sort($menuKecamatans);
                                @endphp
                                @foreach($menuKecamatans as $kec)
                                    @php
                                        $isCurKec = !empty($activeKecName) && strtolower(trim($activeKecName)) == strtolower(trim($kec));
                                    @endphp
                                    <a href="{{ route('kecamatan.show', $kec) }}" class="flex items-center gap-2 px-3 py-2 rounded-xl text-xs transition-all group/item {{ $isCurKec ? 'bg-blue-50 text-blue-600 font-extrabold shadow-2xs' : 'font-semibold text-slate-700 hover:bg-blue-50/70 hover:text-blue-700' }}">
                                        <span class="w-2 h-2 rounded-full transition-colors {{ $isCurKec ? 'bg-blue-600 shadow-sm' : 'bg-blue-500/30 group-hover/item:bg-blue-600' }}"></span>
                                        {{ $kec }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Hamburger Menu Button -->
                <button @click="openNav = !openNav" 
                        class="md:hidden focus:outline-none p-1.5 rounded-full transition-colors shrink-0" 
                        :class="!isScrolled ? 'text-white' : 'text-slate-700'" aria-label="Menu">
                    <span class="material-symbols-outlined text-2xl" x-text="openNav ? 'close' : 'menu'">menu</span>
                </button>
            </div>

            <!-- Mobile Menu Dropdown Card (Floating Absolute) -->
            <div x-show="openNav" @click.away="openNav = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 -translate-y-4 scale-95" class="md:hidden absolute top-full left-0 right-0 mt-2 mx-2 bg-white/95 backdrop-blur-2xl border border-slate-100 rounded-3xl p-4 shadow-2xl text-slate-800 z-50" style="display: none;">
                <form action="{{ route('layanan.semua') }}" method="GET" class="mb-3">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <span class="material-symbols-outlined text-lg">search</span>
                        </div>
                        <input x-ref="mobileSearchInput" type="text" name="q" placeholder="Cari info pelayanan publik..." class="w-full pl-10 pr-4 py-3 bg-slate-100/80 border border-slate-200/80 rounded-2xl text-xs text-slate-800 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 focus:bg-white outline-none font-medium transition-all">
                    </div>
                </form>

                <div class="space-y-1.5">
                    <a href="{{ route('home') }}" class="block px-4 py-3 rounded-2xl text-xs font-extrabold transition-all {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-700 hover:bg-slate-50' }}">Beranda</a>
                    <a href="{{ route('sektor.semua') }}" class="block px-4 py-3 rounded-2xl text-xs font-extrabold transition-all {{ request()->routeIs('sektor.*') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-700 hover:bg-slate-50' }}">Sektor Pelayanan</a>
                    <a href="{{ route('layanan.semua') }}" class="block px-4 py-3 rounded-2xl text-xs font-extrabold transition-all {{ request()->routeIs('layanan.semua') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-700 hover:bg-slate-50' }}">Semua Layanan</a>
                    
                    <div x-data="{ openKecamatanMobile: false }">
                        <button @click="openKecamatanMobile = !openKecamatanMobile" class="w-full text-left flex justify-between items-center px-4 py-3 rounded-2xl text-xs font-extrabold transition-all {{ request()->routeIs('kecamatan.*') || !empty($activeKecName) ? 'text-blue-600 bg-blue-50/80' : 'text-slate-700 hover:bg-slate-50' }}">
                            <span>Pilih OPD</span>
                            <span class="material-symbols-outlined text-base transition-transform duration-200" :class="{ 'rotate-180': openKecamatanMobile }">expand_more</span>
                        </button>
                        <div x-show="openKecamatanMobile" class="pl-3 pr-2 py-2 grid grid-cols-2 gap-1 bg-slate-50/80 rounded-2xl mt-1" style="display: none;">
                            @php
                                $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                                sort($menuKecamatans);
                            @endphp
                            @foreach($menuKecamatans as $kec)
                                @php
                                    $isCurKecMob = !empty($activeKecName) && strtolower(trim($activeKecName)) == strtolower(trim($kec));
                                @endphp
                                <a href="{{ route('kecamatan.show', $kec) }}" class="block px-3 py-2 rounded-xl text-xs transition-colors {{ $isCurKecMob ? 'font-extrabold text-blue-700 bg-blue-100/70' : 'font-semibold text-slate-600 hover:text-blue-700 hover:bg-blue-100/50' }}">{{ $kec }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Dark Midnight Footer -->
    <footer class="bg-slate-900 text-slate-400 border-t border-slate-800 mt-0 pt-10 sm:pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                
                <!-- Branding -->
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 cursor-pointer mb-5" onclick="window.location.href='{{ route('home') }}'">
                        <img src="{{ asset('images/logo_sispek_tasikmalaya.png') }}" alt="SISPEK Tasikmalaya" class="h-10 w-auto object-contain brightness-200">
                    </div>
                    <p class="text-slate-400 text-xs sm:text-sm mb-6 leading-relaxed">
                        SISPEK (Sistem Informasi Standar Pelayanan Elektronik) portal satu pintu resmi Kota Tasikmalaya untuk pengelolaan & transparansi standar pelayanan publik digital bagi masyarakat.
                    </p>
                </div>

                <!-- Tautan Cepat -->
                <div>
                    <h3 class="text-white font-bold mb-4 text-xs sm:text-sm tracking-wider uppercase">Menu Utama</h3>
                    <ul class="space-y-2.5 text-xs sm:text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors">Beranda</a></li>
                        <li><a href="{{ route('sektor.semua') }}" class="hover:text-blue-400 transition-colors">Sektor Pelayanan</a></li>
                        <li><a href="{{ route('layanan.semua') }}" class="hover:text-blue-400 transition-colors">Daftar Layanan</a></li>
                        <li><a href="https://www.lapor.go.id" target="_blank" class="hover:text-blue-400 transition-colors">Pengaduan LAPOR!</a></li>
                    </ul>
                </div>

                <!-- Instansi Penyelenggara -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-white font-bold mb-4 text-xs sm:text-sm tracking-wider uppercase">Pemerintah Penyelenggara</h3>
                    <ul class="space-y-3.5 text-xs sm:text-sm text-slate-400">
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-blue-400 text-base mt-0.5">location_city</span>
                            <span>Pemerintah Kota Tasikmalaya</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-blue-400 text-base mt-0.5">map</span>
                            <span>Jl. Ir. H. Juanda No.191, Sukamulya, Kec. Bungursari, Kota Tasikmalaya, Jawa Barat 46151</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-blue-400 text-base mt-0.5">call</span>
                            <span>(0265) 7523616</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-blue-400 text-base mt-0.5">mail</span>
                            <span>kominfo@tasikmalayakota.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-[11px] text-slate-500 gap-4">
                <p>&copy; 2026 <span class="font-bold text-slate-300">SISPEK Tasikmalaya</span> — Hak Cipta Dilindungi Undang-Undang.</p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-blue-400 transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-blue-400 transition-colors">Syarat & Ketentuan</a>
                    <a href="#" class="hover:text-blue-400 transition-colors">Aksesibilitas</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>