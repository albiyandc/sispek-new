<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterLayanan extends Model
{
    protected $fillable = [
        'id',
        'sektor_id',
        'nama_layanan',
        'slug',
        'persyaratan_umum',
    ];

    protected $casts = [
        'persyaratan_umum' => 'array',
    ];

    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }

    public function layananInstansis()
    {
        return $this->hasMany(LayananInstansi::class, 'master_layanan_id');
    }
}
