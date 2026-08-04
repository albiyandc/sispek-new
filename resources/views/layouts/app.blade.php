<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISPEK Tasikmalaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; overflow-x: hidden; }
        
        .fade-in-up { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        
        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b sticky top-0 z-50 shadow-sm" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo -->
                <div class="flex items-center gap-3 cursor-pointer" onclick="window.location.href='{{ route('home') }}'">
                    <div class="bg-[#0b53c8] text-white p-2 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div class="text-[#0b53c8] font-extrabold text-lg leading-none tracking-tight">
                        SISPEK <span class="font-normal text-gray-800">Tasikmalaya</span>
                    </div>
                </div>

                <!-- Menu Links -->
                <div class="hidden lg:flex items-center space-x-8 text-sm font-semibold">
                    <a href="{{ route('home') }}" class="text-gray-900 hover:text-[#0b53c8] transition">Beranda</a>
                    <a href="#" class="text-gray-600 hover:text-[#0b53c8] transition">Daerah</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button @click="open = !open" class="text-gray-500 hover:text-gray-900 focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="open" class="lg:hidden bg-white border-t" style="display: none;">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-blue-50">Beranda</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-blue-50">Daerah</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#f2f6fc] border-t py-12 text-sm text-gray-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                
                <!-- Left: Branding -->
                <div class="md:col-span-5">
                    <div class="flex items-center gap-2.5 mb-4 cursor-pointer" onclick="window.location.href='{{ route('home') }}'">
                        <div class="bg-[#0b53c8] text-white p-1.5 rounded-md flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div class="text-[#0b53c8] font-extrabold text-base leading-none tracking-tight">
                            SISPEK <span class="font-normal text-gray-800">Tasikmalaya</span>
                        </div>
                    </div>
                    <p class="text-xs md:text-sm text-gray-500 max-w-sm leading-relaxed">
                        Sistem Informasi Standar Pelayanan Publik dan Elektronik Kecamatan untuk mewujudkan pelayanan yang cepat, transparan, dan terakreditasi.
                    </p>
                </div>

                <!-- Middle: Navigasi Cepat -->
                <div class="md:col-span-4">
                    <h4 class="text-xs font-bold text-gray-400 tracking-wider uppercase mb-3">NAVIGASI CEPAT</h4>
                    <div class="grid grid-cols-2 gap-y-2 text-xs md:text-sm font-medium text-gray-600">
                        <div><a href="#" class="hover:text-[#0b53c8] transition">Tentang Kami</a></div>
                        <div><a href="#" class="hover:text-[#0b53c8] transition">Layanan Publik</a></div>
                        <div><a href="#" class="hover:text-[#0b53c8] transition">Hubungi Kami</a></div>
                        <div><a href="#" class="hover:text-[#0b53c8] transition">Kebijakan Privasi</a></div>
                        <div><a href="#" class="hover:text-[#0b53c8] transition">Peta Situs</a></div>
                    </div>
                </div>

                <!-- Right: Media Sosial -->
                <div class="md:col-span-3">
                    <h4 class="text-xs font-bold text-gray-400 tracking-wider uppercase mb-3">MEDIA SOSIAL</h4>
                    <div class="flex items-center gap-2 mb-6">
                        <a href="#" class="w-8 h-8 rounded-full bg-blue-100/70 text-[#0b53c8] flex items-center justify-center hover:bg-[#0b53c8] hover:text-white transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-blue-100/70 text-[#0b53c8] flex items-center justify-center hover:bg-[#0b53c8] hover:text-white transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-blue-100/70 text-[#0b53c8] flex items-center justify-center hover:bg-[#0b53c8] hover:text-white transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a2.5 2.5 0 002.5-2.5V7.472m.8 1.458A9 9 0 113.055 11z"></path></svg>
                        </a>
                    </div>
                    <div class="text-xs text-gray-500">
                        &copy; 2024 SISPEK Tasikmalaya. All Rights Reserved.
                    </div>
                </div>

            </div>
        </div>
    </footer>
</body>
</html>