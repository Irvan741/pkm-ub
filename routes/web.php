<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\KartuKeluargaController;
use App\Http\Controllers\IndexControllerTamu;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AgendaController;


Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/stunting', function () {
    return view('stunting');
});
Route::get('survey-kepuasan', function(){
    return "On Progress";
});

Route::get('/agenda', [IndexControllerTamu::class, 'agenda']);

Route::get('/profile', [IndexControllerTamu::class, 'profile']);

Route::get('/isu-kesehatan', function () {
    return view('isu-kesehatan');
});

// Route::get('/pendaftaran', function (){
//     return view('pendaftaran');
// });

Route::post('/proses_daftar', [RegistController::class, 'store']);
Route::get('/kritik-saran', [KritikSaranController::class, 'create'])->name('kritik-saran.create');
Route::post('/kritik-saran', [KritikSaranController::class, 'store'])->name('kritik-saran.store');


Route::get('/berita/{slug}', [IndexControllerTamu::class, 'detailPost']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Prefix admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('agenda', AgendaController::class, [
        'as' => 'admin' // supaya jadi admin.agenda.index dst
    ]);
    Route::get('/', [IndexController::class, 'index'])->name('admin.index');
    
    Route::get('/profil', [ProfileController::class, 'index'])->name('admin.profile.index');

    Route::post('/kepala',  [ProfileController::class, 'storeOrUpdateKepala'])->name('admin.profile.kepala.storeOrUpdate');
    Route::post('/profil',  [ProfileController::class, 'storeOrUpdateProfile'])->name('admin.profile.profile.storeOrUpdate');

    Route::post('/personil',        [ProfileController::class, 'storePersonil'])->name('admin.profile.personil.store');
    Route::put('/personil/{id}',    [ProfileController::class, 'updatePersonil'])->name('admin.profile.personil.update');
    Route::delete('/personil/{id}', [ProfileController::class, 'destroyPersonil'])->name('admin.profile.personil.destroy');

    Route::get('/user-role', [UserRoleController::class, 'index'])->name('admin.user-role.index');
    Route::post('/user-role', [UserRoleController::class, 'store'])->name('admin.user-role.store');
    Route::put('/user-role/{user}', [UserRoleController::class, 'update'])->name('admin.user-role.update');
    Route::delete('/user-role/{user}', [UserRoleController::class, 'destroy'])->name('admin.user-role.destroy');

    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('admin.feedback.index');
    Route::get('/feedback/{id}', [FeedbackController::class, 'show'])->name('admin.feedback.show');
    Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('admin.feedback.destroy');

    
    // Route::get('/kartu-keluarga', [KartuKeluargaController::class, 'index'])->name('admin.kartu-keluarga.index');
    // Route::get('/kartu-keluarga/create', [KartuKeluargaController::class, 'create'])->name('admin.kartu-keluarga.create');
    // Route::post('/kartu-keluarga', [KartuKeluargaController::class, 'store'])->name('admin.kartu-keluarga.store');
    // Route::get('/kartu-keluarga/{id}', [KartuKeluargaController::class, 'edit'])->name('admin.kartu-keluarga.edit');
    // Route::put('/kartu-keluarga/{id}', [KartuKeluargaController::class, 'update'])->name('admin.kartu-keluarga.update');
    // Route::delete('/kartu-keluarga/{id}', [KartuKeluargaController::class, 'destroy'])->name('admin.kartu-keluarga.destroy');

    Route::get('/pasien', [PasienController::class, 'index'])->name('admin.pasien.index');
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('admin.pasien.create');
    Route::get('/pasien/detail/{id}', [PasienController::class, 'show'])->name('admin.pasien.show');
    Route::post('/pasien', [PasienController::class, 'store'])->name('admin.pasien.store');
    Route::get('/pasien/{id}', [PasienController::class, 'edit'])->name('admin.pasien.edit');
    Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('admin.pasien.update');
    Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('admin.pasien.destroy');
});
