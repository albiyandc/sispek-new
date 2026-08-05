<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISPEK Tasikmalaya - Sistem Informasi Standar Pelayanan Elektronik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; overflow-x: hidden; }
        .fade-in-up { animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; transform: translateY(20px); }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar Glassmorphism -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 transition-all" x-data="{ openNav: false }">
        <!-- Top Header Row -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 gap-4 sm:gap-8">
                <!-- Logo -->
                <div class="flex items-center gap-3 cursor-pointer shrink-0 group" onclick="window.location.href='{{ route('home') }}'">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#0b53c8] to-indigo-600 flex items-center justify-center text-white font-extrabold shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform">
                        <span class="material-symbols-outlined text-2xl">account_balance</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[#0b53c8] font-black text-2xl tracking-tight leading-none">SISPEK</span>
                        <span class="text-slate-500 text-[9px] font-bold tracking-[0.25em] uppercase leading-none mt-1">Tasikmalaya</span>
                    </div>
                </div>

                <!-- Search Bar (Desktop) -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="hidden md:flex flex-1 max-w-xl pl-6">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-slate-400 text-xl">search</span>
                        </div>
                        <input type="text" name="q" placeholder="Cari info pelayanan publik..." class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200/80 rounded-full text-xs sm:text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all shadow-inner">
                    </div>
                </form>

                <!-- Right Menu (Desktop) -->
                <div class="hidden md:flex items-center space-x-7 text-xs font-semibold text-slate-600 shrink-0">
                    <a href="{{ route('home') }}" class="text-[#0b53c8] font-bold hover:text-blue-800 transition">Beranda</a>
                    
                    <!-- Dropdown Kecamatan -->
                    <div x-data="{ openKecamatan: false }" class="relative flex items-center" @click.away="openKecamatan = false" @mouseenter="openKecamatan = true" @mouseleave="openKecamatan = false">
                        <button class="flex items-center gap-1 hover:text-[#0b53c8] transition outline-none py-2">
                            Kecamatan
                            <span class="material-symbols-outlined text-slate-400 text-base">expand_more</span>
                        </button>
                        <div x-show="openKecamatan" x-transition.opacity class="absolute top-full right-0 mt-1 w-52 bg-white border border-slate-100 rounded-2xl shadow-xl py-2 z-50" style="display: none;">
                            @php
                                $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                                sort($menuKecamatans);
                            @endphp
                            @foreach($menuKecamatans as $kec)
                                <a href="{{ route('kecamatan.show', $kec) }}" class="block px-4 py-2.5 text-xs text-slate-700 hover:bg-blue-50 hover:text-[#0b53c8] font-medium transition flex items-center gap-2">
                                    <span class="material-symbols-outlined text-slate-400 text-sm">location_on</span>
                                    Kec. {{ $kec }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu & Search Button -->
                <div class="md:hidden flex items-center gap-2">
                    <button @click="openNav = !openNav" class="text-slate-600 hover:text-slate-900 focus:outline-none p-2 rounded-xl bg-slate-50">
                        <span class="material-symbols-outlined text-2xl">menu</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="openNav" class="md:hidden bg-white border-t border-slate-100 shadow-xl" style="display: none;">
            <div class="px-4 pt-3 pb-5 space-y-2">
                <!-- Search in Mobile -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="mb-3">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-slate-400 text-lg">search</span>
                        </div>
                        <input type="text" name="q" placeholder="Cari info pelayanan..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200/80 rounded-full text-xs text-slate-700 focus:ring-2 focus:ring-[#0b53c8]">
                    </div>
                </form>

                <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-xl text-xs font-semibold text-[#0b53c8] bg-blue-50">Beranda</a>
                
                <div x-data="{ openKecamatanMobile: false }">
                    <button @click="openKecamatanMobile = !openKecamatanMobile" class="w-full text-left flex justify-between items-center px-4 py-2.5 rounded-xl text-xs font-semibold text-slate-700 hover:text-[#0b53c8] hover:bg-blue-50">
                        Kecamatan
                        <span class="material-symbols-outlined text-slate-400 text-base">expand_more</span>
                    </button>
                    <div x-show="openKecamatanMobile" class="pl-4 pr-2 py-1 space-y-1 bg-slate-50 rounded-xl mt-1" style="display: none;">
                        @php
                            $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                            sort($menuKecamatans);
                        @endphp
                        @foreach($menuKecamatans as $kec)
                            <a href="{{ route('kecamatan.show', $kec) }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:text-[#0b53c8] hover:bg-blue-100/50">Kec. {{ $kec }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow bg-[#f8fafc]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 mt-16 pt-14 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 sm:gap-12 mb-12">
                <!-- Branding -->
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-3 mb-4 cursor-pointer" onclick="window.location.href='{{ route('home') }}'">
                        <div class="w-8 h-8 rounded-lg bg-[#0b53c8] flex items-center justify-center text-white font-extrabold text-sm">
                            <span class="material-symbols-outlined text-lg">account_balance</span>
                        </div>
                        <div class="font-black text-xl text-[#0b53c8] tracking-tight">SISPEK</div>
                    </div>
                    <p class="text-slate-500 text-xs leading-relaxed mb-5">
                        Sistem Informasi Standar Pelayanan Elektronik Terpadu Kota Tasikmalaya untuk mempermudah akses informasi publik yang cepat, transparan, dan akuntabel.
                    </p>
                </div>

                <!-- Navigasi Cepat -->
                <div>
                    <h3 class="text-slate-900 font-bold mb-4 text-xs tracking-wider uppercase">NAVIGASI CEPAT</h3>
                    <ul class="space-y-2.5 text-xs text-slate-500 font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-[#0b53c8] transition">Beranda</a></li>
                        <li><a href="{{ route('layanan.semua') }}" class="hover:text-[#0b53c8] transition">Semua Layanan Publik</a></li>
                        <li><a href="{{ route('home') }}#daftar-layanan" class="hover:text-[#0b53c8] transition">Daftar Kecamatan</a></li>
                    </ul>
                </div>

                <!-- Media Sosial & Kontak -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-slate-900 font-bold mb-4 text-xs tracking-wider uppercase">PEMERINTAH KOTA TASIKMALAYA</h3>
                    <ul class="space-y-3 text-xs text-slate-500 font-medium">
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-[#0b53c8] text-base shrink-0 mt-0.5">location_on</span>
                            <span>Jl. Ir. H. Juanda No.191, Sukamulya, Kec. Bungursari, Kota Tasikmalaya, Jawa Barat 46151</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[#0b53c8] text-base shrink-0">mail</span>
                            <span>diskominfo@tasikmalayakota.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-6 flex flex-col md:flex-row justify-between items-center text-[11px] text-slate-400 font-medium gap-3">
                <p>&copy; 2026 <span class="font-bold text-[#0b53c8]">SISPEK Tasikmalaya</span>. All Rights Reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-slate-600 transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-slate-600 transition">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>