<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\SotkController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\WisataController as AdminWisataController;
use App\Http\Controllers\Admin\SotkController as AdminSotkController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;

/*
|--------------------------------------------------------------------------
| Rute Web
|--------------------------------------------------------------------------
|
| Di sinilah Anda dapat mendaftarkan rute web untuk aplikasi Anda.
|
*/

// == RUTE PUBLIK ==
// Rute yang bisa diakses oleh semua pengunjung.
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/sotk', [SotkController::class, 'index'])->name('sotk.index');
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');


// == RUTE ADMIN ==
// Rute yang dikelompokkan dengan prefix 'admin'.
Route::prefix('admin')->group(function () {

    // Rute untuk menampilkan halaman login
    Route::get('login', function () {
        return view('admin.login');
    })->name('admin.login');

    // Rute untuk memproses login
    Route::post('login', function (Request $request) {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }
        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['email' => 'Email atau password salah.']);
    })->name('admin.login.submit'); // Ini adalah penutup untuk fungsi Route::post

    // Rute untuk logout
    Route::post('logout', function () {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    })->name('admin.logout');

    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('galeri', AdminGaleriController::class)->names('admin.galeri');
    Route::resource('wisata', AdminWisataController::class)->names('admin.wisata');
    Route::resource('sotk', AdminSotkController::class)->names('admin.sotk');
    Route::resource('pengaduan', AdminPengaduanController::class)->names('admin.pengaduan');
}); // Ini adalah penutup untuk Route::prefix('admin')->group
