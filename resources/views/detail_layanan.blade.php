@extends('layouts.app')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen pb-20 pt-0 sm:pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fade-in-up">
        
        <!-- Breadcrumb (Desktop Only) -->
        <div class="hidden sm:flex text-xs text-slate-400 mb-6 items-center gap-1.5 font-medium overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a> 
            <span>&rsaquo;</span> 
            <a href="{{ route('layanan.semua') }}" class="hover:text-blue-600 transition-colors">Pelayanan Publik</a> 
            <span>&rsaquo;</span> 
            @if(isset($layanan->nama_kecamatan))
                @php
                    $cleanKecDetail = str_replace(['Kecamatan ', 'kecamatan '], '', $layanan->nama_kecamatan);
                @endphp
                <a href="{{ route('kecamatan.show', $cleanKecDetail) }}" class="hover:text-blue-600 transition-colors">Kecamatan {{ $cleanKecDetail }}</a> 
                <span>&rsaquo;</span> 
            @endif
            <span class="font-bold text-slate-800">{{ $layanan->nama_layanan ?? 'Detail Layanan' }}</span>
        </div>

        <!-- Header Hero Banner Full Width (Mobile Edge-to-Edge) -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white rounded-none sm:rounded-3xl -mx-4 -mt-20 pt-16 px-5 pb-6 sm:mx-0 sm:mt-0 sm:p-12 mb-8 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <div class="max-w-3xl">
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-white mb-3 tracking-tight leading-tight">
                        {{ $layanan->nama_layanan ?? 'Pembuatan Kartu Keluarga (KK)' }}
                    </h1>
                    <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-2xl">
                        {{ $layanan->produk_pelayanan ?? 'Layanan penerbitan dokumen Kartu Keluarga baru karena perubahan data, pecah KK, atau hilang/rusak bagi warga di wilayah Kota Tasikmalaya.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- 2-Column Grid Layout (Wide Desktop) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Main Content Column (2 Cols) -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- 1. Persyaratan Layanan Card -->
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8 relative overflow-hidden">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="font-extrabold text-slate-900 text-base sm:text-lg">Persyaratan Berkas</h2>
                            <p class="text-xs text-slate-400">Dokumen yang wajib disiapkan sebelum pengajuan</p>
                        </div>
                        <span class="text-[10px] font-bold text-blue-700 bg-blue-50 px-3 py-1 rounded-full uppercase tracking-wider hidden sm:inline-block">Wajib Dipenuhi</span>
                    </div>

                    <!-- List Persyaratan -->
                    <div class="space-y-3.5">
                        @php
                            $persyaratanList = isset($layanan->persyaratan) ? explode("\n", $layanan->persyaratan) : [
                                'Surat pengantar RT/RW setempat yang sudah ditandatangani.',
                                'Fotokopi Buku Nikah atau Kutipan Akta Perkawinan (bagi yang sudah menikah).',
                                'Fotokopi Akta Kelahiran bagi seluruh anggota keluarga yang didaftarkan.',
                                'Kartu Keluarga (KK) asli (jika perubahan data atau pecah KK).',
                                'Surat Keterangan Kehilangan dari Kepolisian (khusus untuk KK hilang).'
                            ];
                        @endphp

                        @foreach($persyaratanList as $item)
                            @if(trim($item) != '')
                            <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-slate-50/70 border border-slate-100/80 hover:bg-blue-50/50 transition-colors">
                                <div class="text-emerald-500 shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-xl">check_circle</span>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold text-slate-700 leading-relaxed">{{ trim($item) }}</span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- 2. Prosedur & Alur Pengajuan Card -->
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8 relative overflow-hidden">
                    <div class="mb-6">
                        <h2 class="font-extrabold text-slate-900 text-base sm:text-lg">Prosedur & Alur Pelayanan</h2>
                        <p class="text-xs text-slate-400">Tahapan proses penyelesaian dokumen dari awal hingga selesai</p>
                    </div>

                    <!-- Timeline Vertikal Modern -->
                    <div class="relative border-l-2 border-emerald-500/20 ml-5 space-y-6 sm:space-y-8 pl-6 my-4">
                        @php
                            $prosedurText = $layanan->prosedur ?? '';
                            $prosedurLines = array_filter(explode("\n", $prosedurText));
                        @endphp

                        @if(count($prosedurLines) > 0)
                            @foreach($prosedurLines as $pIndex => $pLine)
                                <div class="relative group">
                                    <div class="absolute -left-[35px] bg-emerald-500 text-white w-6 h-6 rounded-full border-2 border-white shadow-md flex items-center justify-center text-[10px] font-bold mt-0.5 group-hover:scale-110 transition-transform">
                                        {{ $pIndex + 1 }}
                                    </div>
                                    <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-100/80 group-hover:bg-emerald-50/40 transition-colors">
                                        <p class="text-xs sm:text-sm font-semibold text-slate-800 leading-relaxed">{{ trim($pLine) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="relative group">
                                <div class="absolute -left-[35px] bg-emerald-500 text-white w-6 h-6 rounded-full border-2 border-white shadow-md flex items-center justify-center text-[10px] font-bold mt-0.5">1</div>
                                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-100/80">
                                    <h3 class="font-bold text-slate-900 text-xs sm:text-sm">Pengajuan & Penyerahan Berkas</h3>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">Pemohon menyerahkan kelengkapan berkas persyaratan ke loket pelayanan kecamatan.</p>
                                </div>
                            </div>
                            <div class="relative group">
                                <div class="absolute -left-[35px] bg-emerald-500 text-white w-6 h-6 rounded-full border-2 border-white shadow-md flex items-center justify-center text-[10px] font-bold mt-0.5">2</div>
                                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-100/80">
                                    <h3 class="font-bold text-slate-900 text-xs sm:text-sm">Verifikasi & Validasi Sistem</h3>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">Petugas memverifikasi keabsahan dokumen dan menginput data ke dalam sistem SIAK.</p>
                                </div>
                            </div>
                            <div class="relative group">
                                <div class="absolute -left-[35px] bg-emerald-500 text-white w-6 h-6 rounded-full border-2 border-white shadow-md flex items-center justify-center text-[10px] font-bold mt-0.5">3</div>
                                <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-100/80">
                                    <h3 class="font-bold text-slate-900 text-xs sm:text-sm">Penerbitan & Penyerahan Dokumen</h3>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">Dokumen yang telah disetujui (TTE) dicetak dan diserahkan secara resmi kepada pemohon.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                @if(isset($layananSerupa) && count($layananSerupa) > 0)
                <!-- 3. Layanan Serupa Tersedia di Instansi Lain (Konsep SIPPN) -->
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-2xl">domain</span>
                        </div>
                        <div>
                            <h2 class="font-extrabold text-slate-900 text-base sm:text-lg">Layanan Serupa Tersedia Di</h2>
                            <p class="text-xs text-slate-400">Instansi / kecamatan lain yang menyelenggarakan standar layanan ini</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                        @foreach($layananSerupa as $serupa)
                        <a href="{{ route('layanan.detail', $serupa->id) }}" class="flex items-center gap-3 p-4 rounded-2xl bg-slate-50 hover:bg-blue-50/80 border border-slate-100 transition-all group">
                            <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                {{ substr($serupa->instansi->nama_instansi ?? 'I', 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-xs text-slate-900 group-hover:text-blue-600 transition-colors truncate">
                                    {{ $serupa->instansi->nama_instansi ?? 'Instansi' }}
                                </div>
                                <div class="text-[11px] text-slate-400 font-semibold flex items-center gap-1">
                                    Lihat Syarat Daerah <span class="material-symbols-outlined text-xs">chevron_right</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- Right Sidebar Column (1 Col) -->
            <div class="space-y-6">
                
                <!-- Standar Layanan Info Stack Cards -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-4">
                    <h3 class="font-extrabold text-slate-900 text-sm sm:text-base flex items-center gap-2 pb-2 border-b border-slate-100">
                        <span class="material-symbols-outlined text-blue-600 text-xl">info</span>
                        Informasi Standar Layanan
                    </h3>

                    <!-- Waktu Penyelesaian -->
                    <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-100/60 flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-xl">schedule</span>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">WAKTU PENYELESAIAN</div>
                            <div class="font-extrabold text-slate-900 text-xs sm:text-sm">{{ $layanan->waktu_penyelesaian ?? '1-3 Hari Kerja' }}</div>
                        </div>
                    </div>

                    <!-- Biaya / Tarif -->
                    <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-100/60 flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-xl">payments</span>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">BIAYA / TARIF</div>
                            <div class="font-extrabold text-emerald-600 text-xs sm:text-sm">{{ $layanan->biaya_tarif ?? ($layanan->biaya ?? 'Gratis (Rp 0)') }}</div>
                        </div>
                    </div>

                    <!-- Produk Pelayanan -->
                    <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-100/60 flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-amber-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-xl">description</span>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">PRODUK PELAYANAN</div>
                            <div class="font-extrabold text-slate-900 text-xs sm:text-sm line-clamp-1">{{ $layanan->produk_pelayanan ?? 'Dokumen Resmi' }}</div>
                        </div>
                    </div>

                    <!-- Jumlah Pelaksana -->
                    <div class="p-4 rounded-2xl bg-indigo-50/60 border border-indigo-100/60 flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-xl">group</span>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">JUMLAH PELAKSANA</div>
                            <div class="font-extrabold text-slate-900 text-xs sm:text-sm">Petugas Loket Pelayanan</div>
                            <div class="text-[10px] text-slate-400">(Penanggung Jawab: Kasi Pem)</div>
                        </div>
                    </div>
                </div>

                <!-- Kanal Pengaduan SP4N LAPOR Card -->
                <div class="bg-gradient-to-br from-rose-50 via-red-50/40 to-rose-50 rounded-3xl border border-rose-100 p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-2xl bg-rose-600 text-white flex items-center justify-center shrink-0 shadow-md">
                            <span class="material-symbols-outlined text-xl">campaign</span>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-rose-900 text-sm sm:text-base">Pengaduan Layanan</h3>
                            <p class="text-[11px] text-slate-500">Layanan keluhan & aspirasi masyarakat</p>
                        </div>
                    </div>

                    <p class="text-xs text-slate-600 mb-5 leading-relaxed">
                        Apabila terdapat ketidaksesuaian prosedur atau kendala layanan, laporkan via SP4N LAPOR! atau hubungi kanal resmi:
                    </p>

                    <!-- SP4N LAPOR Button -->
                    <a href="https://www.lapor.go.id" target="_blank" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs py-3 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 mb-5">
                        <span class="material-symbols-outlined text-base">report_problem</span>
                        <span>Lapor via SP4N LAPOR!</span>
                    </a>

                    <div class="space-y-2.5 text-xs text-slate-700 font-semibold">
                        <div class="flex items-center gap-3 p-3 bg-white/90 rounded-2xl border border-rose-100">
                            <span class="material-symbols-outlined text-rose-600 text-base shrink-0">call</span>
                            <span>(0265) 123456 - Ext 102</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-white/90 rounded-2xl border border-rose-100">
                            <span class="material-symbols-outlined text-rose-600 text-base shrink-0">mail</span>
                            <span class="break-all text-[11px]">pengaduan@tasikmalayakota.go.id</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-white/90 rounded-2xl border border-rose-100">
                            <span class="material-symbols-outlined text-rose-600 text-base shrink-0">chat</span>
                            <span>WhatsApp: 081312226045</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection