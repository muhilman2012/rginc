<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Participant;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TournamentMatch;

class TeamGroupingController extends Controller
{
    public function index()
    {
        // CEK APAKAH TIM SUDAH PERNAH DI-GENERATE & DIKUNCI
        $existingTeams = Team::with('members.participant')->get();
        $isLocked = $existingTeams->count() > 0;

        if ($isLocked) {
            $matches = TournamentMatch::with(['team1', 'team2'])->where('round_name', 'semifinal')->get();
            return view('admin.teams.index', compact('isLocked', 'matches'));
        }

        // ==========================================
        // JIKA BELUM DIKUNCI (TAMPILKAN PREVIEW)
        // ==========================================
        
        // Asumsi nama kategori (Sesuaikan jika nama kategori di DB Anda berbeda)
        $idMaleSenior = Category::where('name', 'like', '%Male Senior%')->value('id');
        $idMaleJunior = Category::where('name', 'like', '%Male Junior%')->value('id');
        $idFemale = Category::where('name', 'like', '%Female%')->value('id');
        $idAdvance = Category::where('name', 'like', '%Advance%')->value('id');

        $getTop8 = function ($categoryId) {
            return Participant::where('category_id', $categoryId)
                ->whereHas('scores', function ($q) {
                    $q->where('round', 'preliminary')->where('status', 'approved');
                })
                ->with(['scores' => function ($q) {
                    $q->where('round', 'preliminary')->where('status', 'approved')
                      ->orderBy('score_value', 'desc')->orderBy('created_at', 'asc');
                }])
                ->get()
                ->map(function ($p) {
                    $bestScore = $p->scores->first();
                    $p->highest_score = $bestScore->score_value ?? 0;
                    $p->score_time = $bestScore->created_at ?? now();
                    return $p;
                })
                ->sortBy([['highest_score', 'desc'], ['score_time', 'asc']])
                ->values()
                ->take(8);
        };

        $topMaleSenior = $getTop8($idMaleSenior);
        $topMaleJunior = $getTop8($idMaleJunior);
        $topFemale = $getTop8($idFemale);
        $topAdvance = $getTop8($idAdvance);

        $isReady = ($topMaleSenior->count() == 8 && $topMaleJunior->count() == 8 && $topFemale->count() == 8 && $topAdvance->count() == 8);

        $teamsPreview = [];
        $teamNames = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

        for ($i = 0; $i < 8; $i++) {
            $teamsPreview[$teamNames[$i]] = [
                'name' => 'TIM ' . $teamNames[$i],
                'male_senior' => $topMaleSenior->get($i),
                'advance' => $topAdvance->get($i),
                'female' => $topFemale->get(7 - $i),
                'male_junior' => $topMaleJunior->get(7 - $i),
            ];
        }

        return view('admin.teams.index', compact('isLocked', 'isReady', 'teamsPreview'));
    }

    public function store(Request $request)
    {
        // Pastikan belum ada tim yang terkunci untuk menghindari double insert
        if (Team::count() > 0) {
            return back()->with('error', 'Tim sudah digenerate sebelumnya!');
        }

        DB::beginTransaction();
        try {
            // Re-fetch Top 8 (Sama seperti logika di Index)
            $idMaleSenior = Category::where('name', 'like', '%Male Senior%')->value('id');
            $idMaleJunior = Category::where('name', 'like', '%Male Junior%')->value('id');
            $idFemale = Category::where('name', 'like', '%Female%')->value('id');
            $idAdvance = Category::where('name', 'like', '%Advance%')->value('id');

            $getTop8 = function ($categoryId) {
                return Participant::where('category_id', $categoryId)
                    ->whereHas('scores', function ($q) { $q->where('round', 'preliminary')->where('status', 'approved'); })
                    ->with(['scores' => function ($q) { $q->where('round', 'preliminary')->where('status', 'approved')->orderBy('score_value', 'desc')->orderBy('created_at', 'asc'); }])
                    ->get()->map(function ($p) {
                        $bestScore = $p->scores->first();
                        $p->highest_score = $bestScore->score_value ?? 0;
                        $p->score_time = $bestScore->created_at ?? now();
                        return $p;
                    })->sortBy([['highest_score', 'desc'], ['score_time', 'asc']])->values()->take(8);
            };

            $topMaleSenior = $getTop8($idMaleSenior);
            $topMaleJunior = $getTop8($idMaleJunior);
            $topFemale = $getTop8($idFemale);
            $topAdvance = $getTop8($idAdvance);

            $teamNames = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
            $savedTeams = [];

            // 1. Simpan 8 Tim dan 32 Anggota
            for ($i = 0; $i < 8; $i++) {
                $team = Team::create(['name' => 'TIM ' . $teamNames[$i], 'stage' => 'semifinal']);
                $savedTeams[$teamNames[$i]] = $team;

                $membersToInsert = [];
                if($topMaleSenior->get($i)) $membersToInsert[] = ['team_id' => $team->id, 'participant_id' => $topMaleSenior->get($i)->id, 'created_at' => now(), 'updated_at' => now()];
                if($topAdvance->get($i)) $membersToInsert[] = ['team_id' => $team->id, 'participant_id' => $topAdvance->get($i)->id, 'created_at' => now(), 'updated_at' => now()];
                if($topFemale->get(7 - $i)) $membersToInsert[] = ['team_id' => $team->id, 'participant_id' => $topFemale->get(7 - $i)->id, 'created_at' => now(), 'updated_at' => now()];
                if($topMaleJunior->get(7 - $i)) $membersToInsert[] = ['team_id' => $team->id, 'participant_id' => $topMaleJunior->get(7 - $i)->id, 'created_at' => now(), 'updated_at' => now()];
                
                TeamMember::insert($membersToInsert);
            }

            // 2. Generate Jadwal Match Semifinal Otomatis
            $semifinalMatches = [
                ['team1' => 'A', 'team2' => 'B'],
                ['team1' => 'C', 'team2' => 'D'],
                ['team1' => 'E', 'team2' => 'F'],
                ['team1' => 'G', 'team2' => 'H'],
            ];

            foreach ($semifinalMatches as $match) {
                TournamentMatch::create([
                    'round_name' => 'semifinal',
                    'team1_id' => $savedTeams[$match['team1']]->id,
                    'team2_id' => $savedTeams[$match['team2']]->id,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.teams.index')->with('success', 'Bagan Semifinal berhasil dikunci ke database!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    // Finalisasi Pertandingan (Sistem hitung otomatis siapa yang menang)
    public function finalizeMatch(TournamentMatch $match)
    {
        // Tarik akumulasi skor terbaru dari member
        $team1Score = $match->getAccumulatedScore($match->team1_id);
        $team2Score = $match->getAccumulatedScore($match->team2_id);

        $winnerId = null;
        $isDraw = false;

        // Tentukan pemenang
        if ($team1Score > $team2Score) {
            $winnerId = $match->team1_id;
        } elseif ($team2Score > $team1Score) {
            $winnerId = $match->team2_id;
        } else {
            $isDraw = true;
        }

        // Simpan hasil akhir ke tabel matches
        $match->update([
            'team1_score' => $team1Score,
            'team2_score' => $team2Score,
            'winner_team_id' => $winnerId,
            'is_draw' => $isDraw,
        ]);

        // Jika ini babak Semifinal, langsung ubah status Tim (Final atau Gugur)
        if ($match->round_name === 'semifinal' && $winnerId) {
            $match->team1->update(['stage' => $match->team1_id == $winnerId ? 'final' : 'eliminated']);
            $match->team2->update(['stage' => $match->team2_id == $winnerId ? 'final' : 'eliminated']);
        }

        return back()->with('success', 'Pertandingan selesai! Pemenang ditetapkan otomatis berdasarkan akumulasi skor tertinggi.');
    }

    // Men-generate jadwal liga Final (Week 3, 4, 5)
    public function generateFinals()
    {
        // 1. Pastikan semua duel Semifinal sudah ada pemenangnya
        $semifinalMatches = TournamentMatch::where('round_name', 'semifinal')->get();
        if ($semifinalMatches->whereNull('winner_team_id')->count() > 0) {
            return back()->with('error', 'Gagal! Harap selesaikan dan tentukan pemenang dari semua 4 pertandingan Semifinal terlebih dahulu.');
        }

        // 2. Cek apakah jadwal Final sudah pernah dibuat
        if (TournamentMatch::where('round_name', 'like', 'final_week_%')->exists()) {
            return back()->with('error', 'Jadwal Final sudah di-generate sebelumnya!');
        }

        // 3. Ambil 4 tim yang lolos (status = 'final')
        $finalists = Team::where('stage', 'final')->get();
        if ($finalists->count() !== 4) {
            return back()->with('error', 'Jumlah finalis tidak valid. Harus ada tepat 4 tim yang lolos.');
        }

        DB::beginTransaction();
        try {
            $t = $finalists;

            // FORMAT ROUND ROBIN
            // Week 3
            TournamentMatch::create(['round_name' => 'final_week_3', 'team1_id' => $t[0]->id, 'team2_id' => $t[1]->id]);
            TournamentMatch::create(['round_name' => 'final_week_3', 'team1_id' => $t[2]->id, 'team2_id' => $t[3]->id]);

            // Week 4
            TournamentMatch::create(['round_name' => 'final_week_4', 'team1_id' => $t[0]->id, 'team2_id' => $t[2]->id]);
            TournamentMatch::create(['round_name' => 'final_week_4', 'team1_id' => $t[1]->id, 'team2_id' => $t[3]->id]);

            // Week 5
            TournamentMatch::create(['round_name' => 'final_week_5', 'team1_id' => $t[0]->id, 'team2_id' => $t[3]->id]);
            TournamentMatch::create(['round_name' => 'final_week_5', 'team1_id' => $t[1]->id, 'team2_id' => $t[2]->id]);

            DB::commit();
            return back()->with('success', 'Jadwal Round Robin Final (Week 3, 4, 5) berhasil di-generate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}