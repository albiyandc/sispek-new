<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananInstansi extends Model
{
    protected $table = 'layanan_instansis';

    protected $fillable = [
        'id',
        'instansi_id',
        'master_layanan_id',
        'external_id',
        'status_approval',
        'status_layanan',
        'view_count',
        'catatan_revisi',
        'waktu_penyelesaian',
        'biaya_tarif',
        'produk_pelayanan',
        'persyaratan_khusus',
        'prosedur',
        'pengaduan_channels',
        'created_by',
        'approved_by',
    ];

    protected $casts = [
        'persyaratan_khusus' => 'array',
        'prosedur' => 'array',
        'pengaduan_channels' => 'array',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }

    public function masterLayanan()
    {
        return $this->belongsTo(MasterLayanan::class, 'master_layanan_id');
    }
}
