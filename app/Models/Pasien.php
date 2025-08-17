<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'no_kk', 'nama', 'nik', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp', 'kategori_usia'
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk');
    }


}
