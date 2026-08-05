<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISPEK Tasikmalaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; overflow-x: hidden; }
        .fade-in-up { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b sticky top-0 z-50 shadow-sm" x-data="{ openNav: false }">
        <!-- Top Header Row -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 gap-4 sm:gap-8">
                <!-- Logo -->
                <div class="flex items-center gap-2 cursor-pointer shrink-0" onclick="window.location.href='{{ route('home') }}'">
                    <img src="{{ asset('images/logo_sispek_tasikmalaya.png') }}" alt="SISPEK Tasikmalaya" class="h-10 sm:h-12 w-auto object-contain">
                </div>

                <!-- Search Bar (Desktop) -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="hidden md:flex flex-1 max-w-2xl pl-8">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="q" placeholder="Cari info pelayanan publik" class="w-full pl-12 pr-4 py-2.5 bg-[#f8fafc] border border-gray-100 rounded-full text-sm text-gray-700 focus:ring-2 focus:ring-blue-100 focus:border-blue-300 focus:bg-white transition-all shadow-inner">
                    </div>
                </form>

                <!-- Right Menu (Desktop) -->
                <div class="hidden md:flex items-center space-x-6 text-[13px] font-semibold text-gray-600 shrink-0">
                    <a href="{{ route('home') }}" class="text-[#1e3a8a] hover:text-blue-800 transition">Beranda</a>
                    
                    <!-- Dropdown Kecamatan -->
                    <div x-data="{ openKecamatan: false }" class="relative flex items-center" @click.away="openKecamatan = false" @mouseenter="openKecamatan = true" @mouseleave="openKecamatan = false">
                        <button class="flex items-center gap-1 hover:text-[#1e3a8a] transition outline-none">
                            Kecamatan
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="openKecamatan" x-transition.opacity class="absolute top-full right-0 mt-4 w-48 bg-white border border-gray-100 rounded-xl shadow-lg py-2 z-50" style="display: none;">
                            @php
                                $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                                sort($menuKecamatans);
                            @endphp
                            @foreach($menuKecamatans as $kec)
                                <a href="{{ route('kecamatan.show', $kec) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">{{ $kec }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu & Search Button -->
                <div class="md:hidden flex items-center gap-2">
                    <button class="text-gray-500 hover:text-gray-900 focus:outline-none p-2">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                    <button @click="openNav = !openNav" class="text-gray-500 hover:text-gray-900 focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="openNav" class="md:hidden bg-white border-t border-gray-100" style="display: none;">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <!-- Search in Mobile -->
                <form action="{{ route('layanan.semua') }}" method="GET" class="mb-4 mt-2">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="q" placeholder="Cari info pelayanan publik" class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-100 rounded-md text-sm focus:ring-2 focus:ring-[#1e3a8a]">
                    </div>
                </form>

                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-700 bg-blue-50">Beranda</a>
                
                <div x-data="{ openKecamatanMobile: false }">
                    <button @click="openKecamatanMobile = !openKecamatanMobile" class="w-full text-left flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-700 hover:bg-blue-50">
                        Kecamatan
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openKecamatanMobile" class="pl-6 pr-3 py-1 space-y-1 bg-gray-50 rounded-md" style="display: none;">
                        @php
                            $menuKecamatans = ['Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu', 'Bungursari', 'Tamansari'];
                            sort($menuKecamatans);
                        @endphp
                        @foreach($menuKecamatans as $kec)
                            <a href="{{ route('kecamatan.show', $kec) }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-blue-700 hover:bg-blue-100">{{ $kec }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow bg-[#f4f7fb]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-16 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Branding -->
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 cursor-pointer mb-6" onclick="window.location.href='{{ route('home') }}'">
                        <img src="{{ asset('images/logo_sispek_tasikmalaya.png') }}" alt="SISPEK Tasikmalaya" class="h-10 w-auto object-contain">
                    </div>
                    <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                        SISPEK (Sistem Informasi Standar Pelayanan Elektronik) merupakan portal satu pintu resmi Kota Tasikmalaya untuk pengelolaan dan penyampaian informasi standar pelayanan publik secara digital, transparan, dan akuntabel bagi seluruh warga.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-800 hover:bg-blue-800 hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-800 hover:bg-blue-800 hover:text-white transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></a>
                    </div>
                </div>

                <!-- Tautan Cepat -->
                <div>
                    <h3 class="text-gray-900 font-bold mb-4 text-sm tracking-wide">Menu</h3>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li><a href="#" class="hover:text-blue-600 transition">Beranda</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Pelayanan Publik</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Sektor Strategis</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Profil Instansi</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Kontak Kami</a></li>
                    </ul>
                </div>

                <!-- Dinas Penyelenggara -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-gray-900 font-bold mb-4 text-sm tracking-wide">Dinas Penyelenggara</h3>
                    <ul class="space-y-4 text-sm text-gray-500">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#1e3a8a] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            <span>Dinas Komunikasi dan Informatika Kota Tasikmalaya</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#1e3a8a] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Ir. H. Juanda No.191, Sukamulya, Kec. Bungursari, Kota Tasikmalaya, Jawa Barat 46151</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#1e3a8a] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>(0265) 342xxx</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#1e3a8a] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>diskominfo@tasikmalayakota.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center text-[10px] sm:text-xs text-gray-500">
                <p>&copy; 2026 <span class="font-bold text-blue-900">SISPEK Tasikmalaya</span> - Pemerintah Kota Tasikmalaya.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-blue-600">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-blue-600">Syarat & Ketentuan</a>
                    <a href="#" class="hover:text-blue-600">Aksesibilitas</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>