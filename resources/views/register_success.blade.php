@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
    <div class="bg-slate-800/50 border border-green-500/30 rounded-2xl p-10 shadow-2xl backdrop-blur-sm">
        <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6 text-green-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        
        <h2 class="text-3xl font-bold text-rginc-gold mb-4">Pendaftaran Berhasil!</h2>
        <p class="text-gray-300 mb-6">{{ session('success', 'Data Anda telah kami terima.') }}</p>

        @if(session('participantCode'))
            <div class="bg-slate-900 border border-rginc-gold/20 p-6 rounded-lg mb-8 inline-block">
                <p class="text-sm text-gray-400 mb-2">Kode Peserta Anda:</p>
                <p class="text-2xl font-mono font-bold text-white tracking-widest">{{ session('participantCode') }}</p>
                <p class="text-xs text-yellow-500 mt-2">*Simpan kode ini untuk input skor saat babak penyisihan</p>
            </div>
        @endif

        <div>
            <a href="{{ url('/') }}" class="inline-block bg-rginc-navy border border-rginc-gold text-rginc-gold px-6 py-2 rounded hover:bg-rginc-gold/10 transition">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection