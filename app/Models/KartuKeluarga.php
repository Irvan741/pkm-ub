<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $fillable = [
        'no_kk',
        'kepala_keluarga',
        'alamat',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
    ];

    public function pasiens()
    {
        return $this->hasMany(Pasien::class, 'no_kk', 'no_kk');
    }
}
