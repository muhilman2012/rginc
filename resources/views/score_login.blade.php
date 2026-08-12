@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-4 py-20">
    <div class="bg-slate-800/50 border border-rginc-gold/30 rounded-2xl p-8 shadow-2xl">
        <h2 class="text-2xl font-bold text-center text-rginc-gold mb-6">Portal Input Skor</h2>
        
        @if(session('error'))
            <div class="bg-red-500/20 text-red-400 p-3 rounded mb-4 text-sm">{{ session('error') }}</div>
        @endif

        <form action="{{ route('score.auth') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-sm text-gray-300 mb-2">Kode Peserta / ID AM.Pass</label>
                <input type="text" name="identifier" required placeholder="rginc-xxxxx / AM123..."
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-rginc-gold focus:ring-1 focus:ring-rginc-gold outline-none">
            </div>
            <button type="submit" class="w-full bg-rginc-gold text-rginc-navy font-bold py-3 rounded-lg hover:bg-yellow-500 transition">
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection