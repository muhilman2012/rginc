@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('admin.songs.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2 w-fit transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Lagu
        </a>
    </div>

    <h1 class="text-2xl font-bold text-white mb-6">Tambah Lagu Baru</h1>
    
    <div class="bg-slate-800 p-8 rounded-xl border border-slate-700">
        <!-- Tampilkan error validasi jika ada -->
        @if ($errors->any())
            <div class="bg-red-500/20 text-red-400 p-4 rounded-lg mb-6 border border-red-500/30">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.songs.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-gray-300 mb-2">Judul Lagu</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700 focus:border-rginc-gold focus:outline-none">
            </div>
            
            <div>
                <label class="block text-gray-300 mb-2">Kategori</label>
                <select name="category_id" required class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700 focus:border-rginc-gold focus:outline-none">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach(\App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-gray-300 mb-2">Level</label>
                <input type="text" name="level" value="{{ old('level') }}" required placeholder="Contoh: S15" class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700 focus:border-rginc-gold focus:outline-none">
            </div>
            
            <div>
                <label class="block text-gray-300 mb-2">Babak</label>
                <select name="round" required class="w-full bg-slate-900 p-3 rounded text-white border border-slate-700 focus:border-rginc-gold focus:outline-none">
                    <option value="preliminary" {{ old('round') == 'preliminary' ? 'selected' : '' }}>Preliminary</option>
                    <option value="semifinal" {{ old('round') == 'semifinal' ? 'selected' : '' }}>Semifinal</option>
                    <option value="final" {{ old('round') == 'final' ? 'selected' : '' }}>Final</option>
                </select>
            </div>
            
            <div class="pt-2 pb-4">
                <label class="flex items-center gap-3 text-gray-300 cursor-pointer w-fit">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} class="w-5 h-5 accent-rginc-gold"> 
                    Aktifkan Lagu
                </label>
            </div>
            
            <button type="submit" class="w-full bg-rginc-gold text-rginc-navy font-bold py-3 rounded hover:bg-yellow-500 transition">SIMPAN LAGU</button>
        </form>
    </div>
</div>
@endsection