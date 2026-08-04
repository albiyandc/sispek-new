<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPublik extends Model
{
    use HasFactory;

    protected $table = 'layanan_publik';
    protected $primaryKey = 'id_layanan';
    public $timestamps = false; // created_at ditangani oleh database[cite: 1]

    protected $fillable = [
        'nama_layanan',
        'persyaratan',
        'sistem_mekanisme_prosedur',
        'waktu_penyelesaian',
        'biaya_tarif',
        'produk_pelayanan',
        'pengaduan_pelayanan',
        'status_layanan'
    ];
}