<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Song;
use App\Models\Score;
use Carbon\Carbon;

class ScoreController extends Controller
{
    public function loginForm()
    {
        return view('score_login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
        ]);

        $participant = Participant::where('participant_code', $request->identifier)
            ->orWhere('am_pass_id', $request->identifier)
            ->first();

        if (!$participant) {
            return back()->with('error', 'Kode Peserta atau ID AM.Pass tidak ditemukan.');
        }

        // Pengecekan Jadwal Penyisihan Awal (18-23 Agustus 2026)
        $now = Carbon::now('Asia/Jakarta');
        $startRound = Carbon::create(2026, 8, 18, 0, 0, 0, 'Asia/Jakarta');
        $endRound = Carbon::create(2026, 8, 23, 23, 59, 59, 'Asia/Jakarta');

        // HAPUS COMMENT DI BAWAH JIKA SUDAH RILIS. 
        // (Catatan: Karena saat ini tanggal 12 Agustus, jika tidak dicomment Anda tidak akan bisa masuk untuk testing)
        /*
        if ($now->lessThan($startRound) || $now->greaterThan($endRound)) {
            return back()->with('error', 'Mohon maaf, saat ini di luar jadwal input skor penyisihan (18 - 23 Agustus 2026).');
        }
        */

        session(['participant_id' => $participant->id]);
        return redirect()->route('score.create');
    }

    public function create()
    {
        if (!session()->has('participant_id')) {
            return redirect()->route('score.login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $participant = Participant::with('category')->find(session('participant_id'));
        
        // Ambil lagu HANYA untuk kategori peserta tersebut, dan khusus babak PRELIMINARY yang aktif
        $songs = Song::where('category_id', $participant->category_id)
            ->where('round', 'preliminary')
            ->where('is_active', true)
            ->get();

        return view('score_input', compact('participant', 'songs'));
    }

    public function store(Request $request)
    {
        // SANITASI & VALIDASI KETAT
        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'score_value' => 'required|integer|min:0|max:1000000',
            // Memastikan file benar-benar gambar (sanitasi MIME type, bukan cuma ekstensi) dan Max 2MB
            'proof_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ], [
            'proof_image.max' => 'Ukuran foto maksimal adalah 2MB.',
            'proof_image.image' => 'File yang diupload harus berupa gambar.'
        ]);

        $imagePath = $request->file('proof_image')->store('score_proofs', 'public');

        Score::create([
            'participant_id' => session('participant_id'),
            'song_id' => $request->song_id,
            'score_value' => $request->score_value,
            'proof_image_path' => $imagePath,
            'round' => 'preliminary',
            'status' => 'pending' // Default status menunggu verifikasi admin
        ]);

        return redirect()->route('score.create')->with('success', 'Skor berhasil diunggah dan sedang menunggu verifikasi panitia!');
    }
}