<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Song;
use App\Models\Score;

class DashboardController extends Controller
{
    public function index()
    {
        $totalParticipants = Participant::count();
        $totalSongs = Song::count();
        
        // Menghitung statistik berdasarkan Skor (sistem terbaru)
        $pendingScores = Score::where('status', 'pending')->count();
        $approvedScores = Score::where('status', 'approved')->count();

        return view('admin.dashboard', compact(
            'totalParticipants', 
            'totalSongs', 
            'pendingScores', 
            'approvedScores'
        ));
    }
}