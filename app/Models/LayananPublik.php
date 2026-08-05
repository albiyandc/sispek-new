<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPublik extends Model
{
    use HasFactory;

    protected $table = 'layanan_publik';
    protected $primaryKey = 'id_layanan';
    public $timestamps = true;

    protected $fillable = [
        'simat_layanan_id',
        'kecamatan_id',
        'nama_layanan',
        'slug',
        'persyaratan',
        'sistem_mekanisme_prosedur',
        'waktu_penyelesaian',
        'biaya_tarif',
        'produk_pelayanan',
        'jumlah_pelaksana_teknis',
        'penanggung_jawab_teknis',
        'kualifikasi_pelaksana',
        'pengaduan_langsung',
        'mekanisme_pengaduan_tindak_lanjut',
        'pengaduan_channels',
        'pengaduan_pelayanan',
        'status_layanan',
        'jumlah_klik'
    ];

    protected $casts = [
        'pengaduan_channels' => 'array',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
}