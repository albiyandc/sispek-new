<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    protected $fillable = [
        'id',
        'nama_sektor',
        'slug',
    ];

    public function masterLayanans()
    {
        return $this->hasMany(MasterLayanan::class, 'sektor_id');
    }
}
