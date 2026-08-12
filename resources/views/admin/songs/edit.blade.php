@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="mb-6">
        <a href="{{ route('admin.songs.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Lagu
        </a>
    </div>

    <h1 class="text-2xl font-bold text-white mb-6">Edit Lagu</h1>

    <div class="bg-slate-800 p-8 rounded-xl border border-slate-700">
        @if ($errors->any())
            <div class="bg-red-500/20 text-red-400 p-4 rounded-lg mb-6 border border-red-500/30">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.songs.update', $song->id) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            
            <div>
                <label class="block text-gray-300 mb-2">Judul Lagu</label>
                <input type="text" name="title" value="{{ old('title', $song->title) }}" class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Kategori</label>
                <select name="category_id" class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (old('category_id', $song->category_id) == $cat->id) ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Level</label>
                <input type="text" name="level" value="{{ old('level', $song->level) }}" class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Babak</label>
                <select name="round" class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700">
                    <option value="preliminary" {{ old('round', $song->round) == 'preliminary' ? 'selected' : '' }}>Preliminary</option>
                    <option value="semifinal" {{ old('round', $song->round) == 'semifinal' ? 'selected' : '' }}>Semifinal</option>
                    <option value="final" {{ old('round', $song->round) == 'final' ? 'selected' : '' }}>Final</option>
                </select>
            </div>

            <div class="mb-6 pt-2">
                <label class="flex items-center gap-3 text-gray-300 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $song->is_active) ? 'checked' : '' }} class="w-5 h-5 accent-rginc-gold">
                    <span>Status Lagu (Centang untuk AKTIF)</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-rginc-gold text-rginc-navy font-bold py-3 rounded mt-4">UPDATE LAGU</button>
        </form>
    </div>
</div>
@endsection