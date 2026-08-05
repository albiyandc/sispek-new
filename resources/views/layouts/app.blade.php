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

    <!-- Modern Glassmorphism Navbar -->
    <nav class="glass-nav border-b border-slate-200/80 sticky top-0 z-50 transition-all duration-300" x-data="{ openNav: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 gap-4 sm:gap-8">
                
                <!-- Logo -->
                <div class="flex items-center gap-3 cursor-pointer shrink-0 group" onclick="window.location.href='{{ route('home') }}'">
                    <img src="{{ asset('images/logo_sispek_tasikmalaya.png') }}" alt="SISPEK Tasikmalaya" class="h-10 sm:h-12 w-auto object-contain transition-transform group-hover:scale-105">
                </div>

                <!-- Search Bar (Desktop) -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="hidden md:flex flex-1 max-w-xl pl-6">
                    <div class="relative w-full group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                            <span class="material-symbols-outlined text-xl">search</span>
                        </div>
                        <input type="text" name="q" placeholder="Cari info pelayanan publik, izin, KTP..." class="w-full pl-11 pr-4 py-2.5 bg-slate-100/80 border border-slate-200/60 rounded-full text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all shadow-inner">
                    </div>
                </form>

                <!-- Right Menu (Desktop) -->
                <div class="hidden md:flex items-center space-x-6 text-xs sm:text-sm font-semibold text-slate-700 shrink-0">
                    <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors py-2">Beranda</a>
                    <a href="{{ route('sektor.semua') }}" class="hover:text-blue-600 transition-colors py-2">Sektor</a>
                    
                    <!-- Dropdown Kecamatan -->
                    <div x-data="{ openKecamatan: false }" class="relative flex items-center" @click.away="openKecamatan = false" @mouseenter="openKecamatan = true" @mouseleave="openKecamatan = false">
                        <button class="flex items-center gap-1.5 hover:text-blue-600 transition-colors py-2 outline-none">
                            <span>Kecamatan</span>
                            <span class="material-symbols-outlined text-base text-slate-400 group-hover:text-blue-600">expand_more</span>
                        </button>
                        <div x-show="openKecamatan" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute top-full right-0 mt-2 w-52 bg-white/95 backdrop-blur-lg border border-slate-100 rounded-2xl shadow-xl py-2 z-50" style="display: none;">
                            @php
                                $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                                sort($menuKecamatans);
                            @endphp
                            @foreach($menuKecamatans as $kec)
                                <a href="{{ route('kecamatan.show', $kec) }}" class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                                    <span class="material-symbols-outlined text-sm text-blue-500">location_city</span>
                                    {{ $kec }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu & Search Button -->
                <div class="md:hidden flex items-center gap-2">
                    <button @click="openNav = true; $nextTick(() => $refs.mobileSearchInput.focus())" class="text-slate-600 hover:text-blue-600 focus:outline-none p-2 rounded-xl hover:bg-slate-100 transition-colors" aria-label="Cari">
                        <span class="material-symbols-outlined text-xl">search</span>
                    </button>
                    <button @click="openNav = !openNav" class="text-slate-600 hover:text-blue-600 focus:outline-none p-2 rounded-xl hover:bg-slate-100 transition-colors" aria-label="Menu">
                        <span class="material-symbols-outlined text-2xl" x-text="openNav ? 'close' : 'menu'">menu</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="openNav" x-transition class="md:hidden bg-white/95 backdrop-blur-lg border-t border-slate-100" style="display: none;">
            <div class="px-4 pt-3 pb-6 space-y-3">
                <form action="{{ route('layanan.semua') }}" method="GET" class="mb-3">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <span class="material-symbols-outlined text-lg">search</span>
                        </div>
                        <input x-ref="mobileSearchInput" type="text" name="q" placeholder="Cari info pelayanan publik..." class="w-full pl-10 pr-4 py-2.5 bg-slate-100/80 border border-slate-200/80 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none">
                    </div>
                </form>

                <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-xl text-xs font-bold text-blue-700 bg-blue-50/80">Beranda</a>
                <a href="{{ route('sektor.semua') }}" class="block px-3 py-2.5 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50">Sektor Pelayanan</a>
                
                <div x-data="{ openKecamatanMobile: false }">
                    <button @click="openKecamatanMobile = !openKecamatanMobile" class="w-full text-left flex justify-between items-center px-3 py-2.5 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50">
                        <span>Pilih Kecamatan</span>
                        <span class="material-symbols-outlined text-base text-slate-400" :class="{ 'rotate-180': openKecamatanMobile }">expand_more</span>
                    </button>
                    <div x-show="openKecamatanMobile" class="pl-4 pr-2 py-2 space-y-1 bg-slate-50 rounded-xl mt-1" style="display: none;">
                        @php
                            $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                            sort($menuKecamatans);
                        @endphp
                        @foreach($menuKecamatans as $kec)
                            <a href="{{ route('kecamatan.show', $kec) }}" class="block px-3 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:text-blue-700 hover:bg-blue-100/50 transition-colors">{{ $kec }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Dark Midnight Footer -->
    <footer class="bg-slate-900 text-slate-400 border-t border-slate-800 mt-20 pt-16 pb-8">
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