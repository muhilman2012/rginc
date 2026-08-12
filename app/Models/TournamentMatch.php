<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'round_name', 
        'team1_id', 
        'team2_id', 
        'team1_score', 
        'team2_score', 
        'winner_team_id', 
        'is_draw'
    ];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_team_id');
    }

    // FUNGSI BARU: Menghitung skor tim secara dinamis & otomatis
    public function getAccumulatedScore($teamId)
    {
        $team = Team::with('members')->find($teamId);
        if (!$team) return 0;

        // Ambil ID semua anggota dalam tim ini
        $participantIds = $team->members->pluck('participant_id');

        // Jumlahkan skor dari anggota-anggota ini khusus untuk babak pertandingan ini yang sudah di-Approve
        return \App\Models\Score::whereIn('participant_id', $participantIds)
            ->where('round', $this->round_name) // Cocokkan dengan round_name (semifinal, final_week_3, dll)
            ->where('status', 'approved')
            ->sum('score_value');
    }
}