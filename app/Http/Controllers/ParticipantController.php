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
    /**
     * Cek apakah pendaftaran sudah ditutup.
     * 17 Agustus 2026 pukul 00:00:00 WIB sama dengan batas 16 Agustus 23:59:59 WIB
     */
    private function isRegistrationClosed()
    {
        $now = Carbon::now('Asia/Jakarta');
        $closeDate = Carbon::create(2026, 8, 17, 0, 0, 0, 'Asia/Jakarta');
        return $now->greaterThanOrEqualTo($closeDate);
    }

    public function create()
    {
        // 1. Proteksi Halaman Form
        if ($this->isRegistrationClosed()) {
            return view('closed', ['message' => 'Pendaftaran telah ditutup sejak 16 Agustus 2026 pukul 23:59 WIB.']);
        }

        $categories = Category::all();
        return view('register', compact('categories'));
    }

    public function store(Request $request)
    {
        // 2. Proteksi Endpoint POST (Anti-Inject API/Postman)
        if ($this->isRegistrationClosed()) {
            return redirect()->route('register')->with('error', 'Maaf, pendaftaran sudah ditutup.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ig_username' => 'required|string',
            'whatsapp_number' => 'required|string',
            'email' => 'required|email|unique:participants,email',
            'am_pass_id' => 'required|string|unique:participants,am_pass_id',
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

        try {
            Mail::to($participant->email)->send(new RegistrationSuccessMail($participant, $participantCode));
        } catch (\Exception $e) {
            \Log::error('Email gagal dikirim ke: ' . $participant->email . ' Error: ' . $e->getMessage());
        }

        return redirect()->route('register.success')->with([
            'success' => "Pendaftaran berhasil! Silakan cek kotak masuk (Inbox) atau folder Spam pada email Anda.",
            'participantCode' => $participantCode 
        ]);
    }

    public function success()
    {
        return view('register_success');
    }
}