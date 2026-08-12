<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController as PublicParticipantController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ParticipantController as AdminParticipantController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\TeamGroupingController;
use App\Http\Controllers\Admin\ScoreVerificationController; // Tambahkan import ini

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rules', function () {
    return view('rules');
})->name('rules');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Route Registrasi Publik
Route::get('/register', [PublicParticipantController::class, 'create'])->name('register');
Route::post('/register', [PublicParticipantController::class, 'store'])->name('register.store');
Route::get('/register-success', [PublicParticipantController::class, 'success'])->name('register.success');

// Route Input Skor (Penyisihan)
Route::get('/score/login', [ScoreController::class, 'loginForm'])->name('score.login');
Route::post('/score/login', [ScoreController::class, 'authenticate'])->name('score.auth');
Route::get('/score/input', [ScoreController::class, 'create'])->name('score.create');
Route::post('/score/input', [ScoreController::class, 'store'])->name('score.store');

// Route Leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');
Route::get('/leaderboard/{slug}', [LeaderboardController::class, 'show'])->name('leaderboard.show');

// Rute Login Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Rute Admin Terproteksi (Hanya bisa diakses Admin yang sudah login)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Peserta (Rute status dihapus karena approval sudah tidak di level peserta)
    Route::resource('participants', AdminParticipantController::class)->except(['create', 'store']);
    
    // Manajemen Skor & Verifikasi (Untuk Admin)
    Route::get('scores', [ScoreVerificationController::class, 'index'])->name('scores.index');
    Route::patch('scores/{score}/verify', [ScoreVerificationController::class, 'verify'])->name('scores.verify');
    
    // Manajemen Lagu
    Route::resource('songs', SongController::class);

    // Auto Grouping Tim Semifinal
    Route::get('teams/generate', [TeamGroupingController::class, 'index'])->name('teams.index');
    Route::post('teams/generate', [TeamGroupingController::class, 'generate'])->name('teams.generate');
    // Update Skor Battle & Generate Final
    Route::post('teams/store', [TeamGroupingController::class, 'store'])->name('teams.store'); // Yang sebelumnya
    Route::patch('teams/matches/{match}/finalize', [TeamGroupingController::class, 'finalizeMatch'])->name('teams.matches.finalize');
    Route::post('teams/generate-finals', [TeamGroupingController::class, 'generateFinals'])->name('teams.generate.finals');
});