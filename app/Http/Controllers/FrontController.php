<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LayananPublik;

class FrontController extends Controller
{
    public function index()
    {
        // Daftar kecamatan disimulasikan secara statis sesuai tampilan beranda
        $kecamatans = [
            'Cihideung', 'Cipedes', 'Tawang', 'Indihiang', 
            'Kawalu', 'Cibeureum', 'Mangkubumi', 'Purbaratu'
        ];
        
        return view('home', compact('kecamatans'));
    }

    public function kecamatan($nama_kecamatan)
    {
        // Mengambil layanan publik yang berstatus aktif dari database[cite: 1]
        $layanans = LayananPublik::where('status_layanan', 'aktif')->get();
        
        return view('kecamatan', compact('nama_kecamatan', 'layanans'));
    }

    public function detailLayanan($id)
    {
        // Mengambil detail layanan spesifik berdasarkan ID[cite: 1]
        $layanan = LayananPublik::findOrFail($id);
        
        return view('detail_layanan', compact('layanan'));
    }
}