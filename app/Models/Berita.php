<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'status',
        'user_id',
    ];

    /**
     * Buat slug otomatis saat set judul (optional, jika pakai manual input juga boleh).
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    /**
     * Relasi ke User (Penulis)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
