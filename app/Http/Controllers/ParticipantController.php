<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Category;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    public function create()
    {
        // Pengecekan Waktu Penutupan (Tetap aktif)
        $now = Carbon::now('Asia/Jakarta');
        $closeDate = Carbon::create(2026, 8, 17, 0, 0, 0, 'Asia/Jakarta');
        if ($now->greaterThanOrEqualTo($closeDate)) {
            return view('closed', ['message' => 'Pendaftaran telah ditutup sejak 17 Agustus 2026.']);
        }

        $categories = Category::all();
        return view('register', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ig_username' => 'required|string',
            'whatsapp_number' => 'required|string',
            'email' => 'required|email|unique:participants,email', // Pastikan email unik divalidasi
            'am_pass_id' => 'required|string|unique:participants,am_pass_id', // Pastikan ID AM Pass unik
            'category_id' => 'required|exists:categories,id',
            'terms' => 'accepted'
        ]);

        $participantCode = 'rginc-' . strtolower(Str::random(5));

        $participant = Participant::create([
            'participant_code' => $participantCode,
            'name' => $validated['name'],
            'ig_username' => $validated['ig_username'],
            'whatsapp_number' => $validated['whatsapp_number'],
            'email' => $validated['email'],
            'am_pass_id' => $validated['am_pass_id'],
            'category_id' => $validated['category_id'],
        ]);

        // Kirim Email secara asynchronous (bisa langsung dicoba tanpa Queue jika belum di-setup)
        try {
            Mail::to($participant->email)->send(new RegistrationSuccessMail($participant, $participantCode));
        } catch (\Exception $e) {
            // Logika fallback jika email gagal terkirim (misal: koneksi terputus), 
            // pendaftaran tetap dianggap berhasil.
            \Log::error('Email gagal dikirim ke: ' . $participant->email . ' Error: ' . $e->getMessage());
        }

        return redirect()->route('register.success')->with([
            'success' => "Pendaftaran berhasil! Silakan cek email Anda secara berkala.",
            'participantCode' => $participantCode 
        ]);
    }

    public function success()
    {
        return view('register_success');
    }
}