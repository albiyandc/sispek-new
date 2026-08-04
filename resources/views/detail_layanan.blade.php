@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-8 py-10">
    <div class="mb-6">
        <a href="javascript:history.back()" class="text-blue-600 hover:underline text-sm font-medium">&larr; Kembali ke Daftar Layanan</a>
    </div>

    <div class="bg-white border rounded-2xl shadow-sm overflow-hidden">
        <div class="bg-[#0b53c8] text-white p-8">
            <h1 class="text-2xl font-bold">{{ $layanan->nama_layanan }}</h1>
        </div>
        
        <div class="p-8 space-y-8">
            <!-- Komponen Standar Pelayanan Berdasarkan PDF -->
            
            <section>
                <h2 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4 flex items-center gap-2">
                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-sm">1</span> Persyaratan
                </h2>
                <div class="text-gray-600 prose prose-sm max-w-none">
                    {!! nl2br(e($layanan->persyaratan)) !!}
                </div>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4 flex items-center gap-2">
                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-sm">2</span> Sistem, Mekanisme dan Prosedur
                </h2>
                <div class="text-gray-600 prose prose-sm max-w-none">
                    {!! nl2br(e($layanan->sistem_mekanisme_prosedur)) !!}
                </div>
            </section>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <section>
                    <h2 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-sm">3</span> Waktu Penyelesaian
                    </h2>
                    <p class="text-gray-600">{{ $layanan->waktu_penyelesaian }}</p>
                </section>

                <section>
                    <h2 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-sm">4</span> Biaya / Tarif
                    </h2>
                    <p class="text-gray-600 font-semibold text-green-600">{{ $layanan->biaya_tarif }}</p>
                </section>
            </div>

            <section>
                <h2 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4 flex items-center gap-2">
                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-sm">5</span> Produk Pelayanan
                </h2>
                <p class="text-gray-600">{{ $layanan->produk_pelayanan }}</p>
            </section>

            <section class="bg-red-50 p-6 rounded-xl border border-red-100">
                <h2 class="text-lg font-bold text-red-800 mb-3 flex items-center gap-2">
                    <span class="bg-red-200 text-red-800 w-6 h-6 rounded-full flex items-center justify-center text-sm">6</span> Pengaduan Pelayanan
                </h2>
                <div class="text-red-700 text-sm">
                    {!! nl2br(e($layanan->pengaduan_pelayanan)) !!}
                </div>
            </section>
            
        </div>
    </div>
</div>
@endsection