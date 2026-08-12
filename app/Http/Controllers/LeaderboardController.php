<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Participant;

class LeaderboardController extends Controller
{
    // Mengarahkan akses /leaderboard langsung ke kategori pertama
    public function index()
    {
        $firstCategory = Category::first();
        if ($firstCategory) {
            return redirect()->route('leaderboard.show', $firstCategory->slug);
        }
        return abort(404, 'Kategori tidak ditemukan.');
    }

    // Menampilkan klasemen berdasarkan Slug URL
    public function show($slug)
    {
        $categories = Category::all();
        
        // Cari Kategori berdasarkan slug
        $selectedCategory = Category::where('slug', $slug)->firstOrFail();
        
        $currentRound = 'preliminary';
        $roundTitle = 'Babak Penyisihan';

        $leaderboardData = Participant::where('category_id', $selectedCategory->id)
            // HANYA ambil peserta yang punya minimal 1 skor berstatus 'approved'
            ->whereHas('scores', function ($query) use ($currentRound) {
                $query->where('round', $currentRound)
                      ->where('status', 'approved'); 
            })
            // Ambil relasi skor yang sudah di-approve, urutkan tertinggi dan tercepat
            ->with(['scores' => function ($query) use ($currentRound) {
                $query->where('round', $currentRound)
                      ->where('status', 'approved')
                      ->orderBy('score_value', 'desc')
                      ->orderBy('created_at', 'asc');
            }])
            ->get()
            // Map data agar mudah diakses di View (Blade)
            ->map(function ($participant) {
                $bestScore = $participant->scores->first(); // Akan mengambil skor tertinggi/tercepat yang sudah disort di atas
                
                $participant->highest_score = $bestScore->score_value ?? 0;
                $participant->score_time = $bestScore->created_at ?? now(); // Digunakan untuk tie-breaker
                
                // Opsional: jika Anda butuh menampilkan nama lagu terbaiknya di leaderboard
                $participant->best_song = $bestScore->song->title ?? '-';
                
                return $participant;
            })
            // Proses Pengurutan Ganda (Sort By Skor Tertinggi, lalu Waktu Tercepat)
            ->sortBy([
                ['highest_score', 'desc'],
                ['score_time', 'asc'],
            ])
            ->values();

        // Pass variabel $selectedCategory->slug ke view untuk styling tombol aktif
        $activeSlug = $selectedCategory->slug;

        return view('leaderboard', compact('categories', 'activeSlug', 'leaderboardData', 'roundTitle'));
    }
}