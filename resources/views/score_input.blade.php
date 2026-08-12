@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">
    
    <div class="bg-slate-800/50 border border-rginc-gold/30 rounded-2xl p-8">
        <div class="flex justify-between items-center mb-8 pb-4 border-b border-slate-700">
            <div>
                <h2 class="text-2xl font-bold text-white">Upload Skor Penyisihan</h2>
                <p class="text-rginc-gold">{{ $participant->name }} | {{ $participant->category->name }}</p>
            </div>
            <a href="{{ url('/') }}" class="text-sm text-gray-400 hover:text-white">Keluar</a>
        </div>

        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('score.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Pilih Lagu -->
            <div>
                <label class="block text-sm text-gray-300 mb-2">Lagu yang dimainkan</label>
                <select name="song_id" required class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-rginc-gold outline-none">
                    <option value="">-- Pilih Lagu --</option>
                    @foreach($songs as $song)
                        <option value="{{ $song->id }}">{{ $song->title }} (Level: {{ $song->level }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Angka Skor -->
            <div>
                <label class="block text-sm text-gray-300 mb-2">Total Skor (Angka)</label>
                <input type="number" name="score_value" required placeholder="Contoh: 850000"
                    onwheel="this.blur()"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-rginc-gold outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
            </div>

            <!-- Upload Bukti -->
            <div>
                <label class="block text-sm text-gray-300 mb-2">Upload Foto Bukti Skor (Max 2MB)</label>
                <input type="file" name="proof_image" accept="image/*" required 
                    class="w-full bg-slate-900 text-gray-400 border border-slate-700 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-rginc-gold file:text-rginc-navy hover:file:bg-yellow-500 transition">
            </div>

            <button type="submit" class="w-full bg-rginc-gold text-rginc-navy font-bold py-3 rounded-lg hover:bg-yellow-500 transition mt-4">
                Upload Skor
            </button>
        </form>
    </div>
</div>
@endsection