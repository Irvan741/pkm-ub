<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'jenis_layanan',
        'tanggal_pelayanan',
        'penilaian',
        'perlu_diperbaiki',
        'saran',
        'bersedia_dihubungi',
        'kontak',
    ];
}
