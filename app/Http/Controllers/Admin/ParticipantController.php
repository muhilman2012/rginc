<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Category;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $query = Participant::with('category');

        // 1. Fitur Search (Nama, IG, AM Pass ID)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('ig_username', 'like', "%{$search}%")
                ->orWhere('am_pass_id', 'like', "%{$search}%");
            });
        }

        // 2. Fitur Filter Kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 3. Fitur Sorting
        $sortColumn = $request->get('sort', 'created_at'); 
        $sortDirection = $request->get('direction', 'desc');

        // Validasi kolom yang diizinkan untuk di-sort
        $allowedSorts = ['name', 'am_pass_id', 'created_at'];
        if (in_array($sortColumn, $allowedSorts)) {
            $query->orderBy($sortColumn, $sortDirection);
        }

        $participants = $query->paginate(15);

        return view('admin.participants.index', compact('participants'));
    }

    public function edit(\App\Models\Participant $participant)
    {
        $categories = \App\Models\Category::all();
        return view('admin.participants.edit', compact('participant', 'categories'));
    }

    public function update(Request $request, \App\Models\Participant $participant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ig_username' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
            // Pengecualian unique email untuk ID peserta ini sendiri agar tidak error saat disimpan
            'email' => 'required|email|unique:participants,email,' . $participant->id,
            'am_pass_id' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,id',
        ]);

        $participant->update($request->all());

        return redirect()->route('admin.participants.index')->with('success', 'Data peserta berhasil diperbarui!');
    }

    public function destroy(\App\Models\Participant $participant)
    {
        // Hapus peserta. Jika Anda mengatur foreign key cascade di database, 
        // skor terkait akan ikut terhapus otomatis.
        $participant->delete();
        
        return redirect()->route('admin.participants.index')->with('success', 'Peserta berhasil dihapus!');
    }
}