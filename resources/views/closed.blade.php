@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
    <div class="bg-slate-800/50 border border-red-500/30 rounded-2xl p-10 shadow-2xl backdrop-blur-sm">
        
        <!-- Ikon Gembok / Terkunci -->
        <div class="w-20 h-20 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-6 text-red-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        
        <h2 class="text-3xl font-bold text-white mb-4 uppercase tracking-wider">Pendaftaran Ditutup</h2>
        <p class="text-gray-300 mb-8 text-lg">{{ $message }}</p>

        <p class="text-sm text-gray-400 mb-8">
            Terima kasih atas antusiasme Anda. Sampai jumpa di kompetisi Mighty One!
        </p>

        <div>
            <a href="{{ url('/') }}" class="inline-block bg-rginc-navy border border-rginc-gold text-rginc-gold px-8 py-3 rounded-xl font-bold hover:bg-rginc-gold/10 transition shadow-lg">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection