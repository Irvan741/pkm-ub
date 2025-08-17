<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Berita;
use App\Models\Pasien;
use App\Models\KartuKeluarga;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(){
        $totalKK     = KartuKeluarga::count();
        $totalAkun   = User::count();
        $totalBerita = Berita::count();
        $feedback    = Feedback::count();
    
        // Set timezone ke GMT+8
        $now       = Carbon::now('Asia/Makassar'); 
        $today     = $now->toDateString();
        $month     = $now->month;
        $year      = $now->year;
    
        // Total pasien unik (berdasarkan NIK)
        // $totalPasienHariIni = Pasien::whereDate('created_at', $today)
        //                             ->distinct('nik')
        //                             ->count('nik');
    
        // $totalPasienBulanIni = Pasien::whereMonth('created_at', $month)
        //                              ->whereYear('created_at', $year)
        //                              ->distinct('nik')
        //                              ->count('nik');
    
        // $totalPasienTahunIni = Pasien::whereYear('created_at', $year)
        //                              ->distinct('nik')
        //                              ->count('nik');
    
        // Total registrasi (tanpa filter NIK)
        // $totalRegistrasiHariIni = Pasien::whereDate('created_at', $today)->count();
        // $totalRegistrasiBulanIni = Pasien::whereMonth('created_at', $month)
        //                                  ->whereYear('created_at', $year)
        //                                  ->count();
        // $totalRegistrasiTahunIni = Pasien::whereYear('created_at', $year)->count();
    
        // Kategori umur (unik NIK)
        // $kategoriCounts = [
        //     'Balita'     => Pasien::where('kategori_usia', 'Balita')->distinct('nik')->count('nik'),
        //     'Anak-anak'  => Pasien::where('kategori_usia', 'Anak-anak')->distinct('nik')->count('nik'),
        //     'Remaja'     => Pasien::where('kategori_usia', 'Remaja')->distinct('nik')->count('nik'),
        //     'Dewasa'     => Pasien::where('kategori_usia', 'Dewasa')->distinct('nik')->count('nik'),
        //     'Lansia'     => Pasien::where('kategori_usia', 'Lansia')->distinct('nik')->count('nik'),
        // ];
    
        return view('admin.dashboard', compact(
            'totalKK',
            'totalAkun',
            'totalBerita',
            'feedback',
        ));
    }
    
    
}
