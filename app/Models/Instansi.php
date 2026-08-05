<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $fillable = [
        'id',
        'kode_instansi',
        'nama_instansi',
        'jenis',
        'subdomain',
        'maklumat_isi',
        'maklumat_penandatangan',
        'ikm_nilai',
        'ikm_kategori',
        'ikm_tahun',
        'ikm_responden',
        'ikm_periode',
        'jam_kerja',
        'jumlah_pelaksana',
        'penanggung_jawab',
        'kualifikasi_pelaksana',
        'alamat',
        'telepon',
        'email',
        'mekanisme_pengaduan_global',
    ];

    public function layanans()
    {
        return $this->hasMany(LayananInstansi::class, 'instansi_id');
    }
}
