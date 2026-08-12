<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Models\Category;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(Request $request)
    {
        // Memulai query dengan relasi kategori
        $query = Song::with('category');

        // 1. Fitur Search (berdasarkan judul lagu)
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // 2. Fitur Filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('round')) {
            $query->where('round', $request->round);
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        // 3. Fitur Sorting (Pengurutan)
        // Default urutan adalah id descending (terbaru) jika tidak ada request sort
        $sortColumn = $request->get('sort', 'id'); 
        $sortDirection = $request->get('direction', 'desc');

        // Validasi kolom yang diizinkan untuk di-sort (untuk mencegah SQL Injection)
        $allowedSorts = ['title', 'level', 'round', 'id'];
        if (in_array($sortColumn, $allowedSorts)) {
            $query->orderBy($sortColumn, $sortDirection);
        }

        // Eksekusi query dengan paginasi
        $songs = $query->paginate(10);

        return view('admin.songs.index', compact('songs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.songs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'round' => 'required|string',
            'level' => 'required|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Song::create($data);

        return redirect()->route('admin.songs.index')->with('success', 'Lagu berhasil ditambahkan!');
    }

    public function edit(Song $song)
    {
        $categories = \App\Models\Category::all();
        return view('admin.songs.edit', compact('song', 'categories'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'round' => 'required|string',
            'level' => 'required|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $song->update($data);

        return redirect()->route('admin.songs.index')->with('success', 'Lagu berhasil diperbarui!');
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('admin.songs.index')->with('success', 'Lagu berhasil dihapus!');
    }
}