<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;

class ScoreVerificationController extends Controller
{
    public function index(Request $request)
    {
        $query = Score::with(['participant', 'song']);

        // Filter status (Pending, Approved, Rejected)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        } else {
            // Default tampilkan yang pending di atas
            $query->orderByRaw("FIELD(status, 'pending', 'approved', 'rejected')");
        }

        // Urutkan dari yang terbaru masuk
        $scores = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.scores.index', compact('scores'));
    }

    public function verify(Request $request, Score $score)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $score->update([
            'status' => $request->status
        ]);

        $message = $request->status == 'approved' ? 'Skor berhasil diverifikasi (Approved).' : 'Skor ditolak (Rejected).';
        return redirect()->back()->with('success', $message);
    }
}