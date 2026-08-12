@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-rginc-gold flex items-center gap-2 text-sm font-semibold w-fit">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Dashboard Admin
        </a>
    </div>

    <!-- Header & Action Buttons -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-slate-700 pb-6">
        <div>
            <h1 class="text-3xl font-black text-white uppercase tracking-wider">Manajemen Semifinal</h1>
            <p class="text-gray-400 mt-1">
                {{ $isLocked ? 'Bagan pertandingan sudah dikunci dan aktif.' : 'Sistem otomatis mendistribusikan Top 8 peserta menjadi 8 Tim.' }}
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            @if(!$isLocked)
                @if($isReady ?? false)
                    <form action="{{ route('admin.teams.store') }}" method="POST">
                        @csrf
                        <button type="button" 
                            onclick="confirmAction(event, 'Kunci Bagan Tim?', 'Tim dan jadwal pertandingan Semifinal akan disimpan ke database secara permanen.', 'Ya, Kunci Sekarang', '#eab308')" 
                            class="bg-rginc-gold text-rginc-navy font-bold px-6 py-3 rounded-lg hover:bg-yellow-500 transition shadow-lg shadow-rginc-gold/20 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Simpan & Kunci Tim
                        </button>
                    </form>
                @else
                    <div class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-2 rounded-lg text-sm font-bold animate-pulse">
                        ⚠ Kuota Top 8 Belum Lengkap
                    </div>
                @endif
            @else
                <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded-lg text-sm font-bold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    DATABASE TERKUNCI
                </div>

                <!-- Tombol Lanjut ke Final muncul jika 4 match selesai -->
                @if(isset($matches) && $matches->whereNotNull('winner_team_id')->count() == 4)
                    <form action="{{ route('admin.teams.generate.finals') }}" method="POST">
                        @csrf
                        <button type="button" 
                            onclick="confirmAction(event, 'Mulai Babak Final?', 'Ini akan menggenerate jadwal Week 3, 4, dan 5 secara otomatis untuk 4 Tim Pemenang.', 'Ya, Generate Final', '#22c55e')" 
                            class="bg-green-600 hover:bg-green-500 text-white font-bold px-6 py-3 rounded-lg transition shadow-lg flex items-center gap-2">
                            🚀 Generate Jadwal Final
                        </button>
                    </form>
                @endif
            @endif
        </div>
    </div>

    <!-- TAMPILAN BRACKET MATCHES -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        @if($isLocked)
            <!-- ================= TAMPILAN JIKA SUDAH DIKUNCI ================= -->
            @foreach($matches->chunk(2) as $index => $bracketMatches)
                <div>
                    <div class="bg-slate-900 border-b-2 border-rginc-gold py-3 px-6 rounded-t-xl mb-4">
                        <h2 class="text-xl font-bold text-white text-center">BRACKET {{ $index + 1 }}</h2>
                    </div>
                    <div class="space-y-8 relative">
                        @foreach($bracketMatches as $match)
                            @php
                                // Tarik skor real-time menggunakan fungsi helper dari model
                                $liveScore1 = $match->getAccumulatedScore($match->team1_id);
                                $liveScore2 = $match->getAccumulatedScore($match->team2_id);
                            @endphp

                            <div class="flex flex-col md:flex-row items-center gap-4 relative">
                                <!-- TEAM 1 -->
                                <div class="bg-slate-800 border {{ $match->winner_team_id == $match->team1_id ? 'border-green-500 shadow-[0_0_15px_rgba(34,197,94,0.2)]' : 'border-slate-700' }} rounded-xl p-5 flex-1 w-full text-center relative overflow-hidden transition-all">
                                    @if($match->winner_team_id == $match->team1_id)
                                        <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">WINNER</div>
                                    @endif
                                    <h3 class="text-2xl font-black text-white mb-1">{{ $match->team1->name }}</h3>
                                    <div class="text-sm text-gray-400 mb-4">{{ $match->team1->members->count() }} Anggota</div>
                                    <div class="bg-slate-900 py-3 rounded-lg border border-slate-700">
                                        <p class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-1">Akumulasi Real-time</p>
                                        <!-- Menampilkan Live Score atau Skor Final Jika Sudah Dikunci -->
                                        <p class="text-2xl font-mono text-rginc-gold font-bold">{{ number_format($match->winner_team_id ? $match->team1_score : $liveScore1) }}</p>
                                    </div>
                                </div>

                                <!-- Bagian VS & Tombol Finalisasi -->
                                <div class="flex flex-col items-center justify-center mx-2 z-10 gap-2">
                                    <div class="bg-red-600 text-white font-black italic px-3 py-1 rounded-lg transform -skew-x-12">VS</div>
                                    
                                    @if(!$match->winner_team_id)
                                        <form action="{{ route('admin.teams.matches.finalize', $match->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="button" 
                                                onclick="confirmAction(event, 'Tutup & Finalisasi Duel?', 'Sistem akan menetapkan pemenang berdasarkan total akumulasi saat ini. Pastikan semua skor peserta sudah diverifikasi!', 'Ya, Tetapkan Pemenang', '#22c55e')" 
                                                class="bg-blue-600 hover:bg-blue-500 text-white text-xs px-3 py-1.5 rounded-lg shadow font-bold whitespace-nowrap transition mt-2">
                                                Kunci Pemenang
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs font-bold text-green-400 bg-green-500/20 px-2 py-1 rounded mt-2">MATCH SELESAI</span>
                                    @endif
                                </div>

                                <!-- TEAM 2 -->
                                <div class="bg-slate-800 border {{ $match->winner_team_id == $match->team2_id ? 'border-green-500 shadow-[0_0_15px_rgba(34,197,94,0.2)]' : 'border-slate-700' }} rounded-xl p-5 flex-1 w-full text-center relative overflow-hidden transition-all">
                                    @if($match->winner_team_id == $match->team2_id)
                                        <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">WINNER</div>
                                    @endif
                                    <h3 class="text-2xl font-black text-white mb-1">{{ $match->team2->name }}</h3>
                                    <div class="text-sm text-gray-400 mb-4">{{ $match->team2->members->count() }} Anggota</div>
                                    <div class="bg-slate-900 py-3 rounded-lg border border-slate-700">
                                        <p class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-1">Akumulasi Real-time</p>
                                        <!-- Menampilkan Live Score atau Skor Final Jika Sudah Dikunci -->
                                        <p class="text-2xl font-mono text-rginc-gold font-bold">{{ number_format($match->winner_team_id ? $match->team2_score : $liveScore2) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        @else
            <!-- ================= TAMPILAN PREVIEW (BELUM DIKUNCI) ================= -->
            @php
                $previewBrackets = [
                    ['A', 'B', 'C', 'D'], // Tim Bracket 1
                    ['E', 'F', 'G', 'H']  // Tim Bracket 2
                ];
            @endphp

            @foreach($previewBrackets as $index => $teamsInBracket)
                <div>
                    <div class="bg-slate-900 border-b-2 border-rginc-gold py-3 px-6 rounded-t-xl mb-4">
                        <h2 class="text-xl font-bold text-white text-center">BRACKET {{ $index + 1 }}</h2>
                    </div>
                    
                    <div class="space-y-8 relative">
                        <!-- Looping untuk setiap battle di dalam bracket -->
                        @for($i = 0; $i < 2; $i++)
                            @php
                                $t1 = $teamsInBracket[$i * 2]; // Ambil tim sisi kiri
                                $t2 = $teamsInBracket[$i * 2 + 1]; // Ambil tim sisi kanan
                            @endphp
                            
                            <div class="flex flex-col md:flex-row items-center gap-4 relative">
                                <!-- TIM KIRI -->
                                <div class="bg-slate-800 border border-slate-700 rounded-xl p-5 flex-1 w-full relative">
                                    <h3 class="text-xl font-black text-rginc-gold mb-3 text-center border-b border-slate-700 pb-2">{{ $teamsPreview[$t1]['name'] }}</h3>
                                    <ul class="text-sm space-y-2">
                                        <li class="flex justify-between"><span class="text-gray-400">M. Senior</span> <span class="text-white font-bold">{{ $teamsPreview[$t1]['male_senior']->name ?? 'Menunggu...' }}</span></li>
                                        <li class="flex justify-between"><span class="text-gray-400">Female</span> <span class="text-white font-bold">{{ $teamsPreview[$t1]['female']->name ?? 'Menunggu...' }}</span></li>
                                        <li class="flex justify-between"><span class="text-gray-400">M. Junior</span> <span class="text-white font-bold">{{ $teamsPreview[$t1]['male_junior']->name ?? 'Menunggu...' }}</span></li>
                                        <li class="flex justify-between"><span class="text-gray-400">Advance</span> <span class="text-white font-bold">{{ $teamsPreview[$t1]['advance']->name ?? 'Menunggu...' }}</span></li>
                                    </ul>
                                </div>

                                <div class="bg-red-600 text-white font-black italic px-3 py-1 rounded-lg transform -skew-x-12 z-10 mx-2 shadow-lg">VS</div>

                                <!-- TIM KANAN -->
                                <div class="bg-slate-800 border border-slate-700 rounded-xl p-5 flex-1 w-full relative">
                                    <h3 class="text-xl font-black text-rginc-gold mb-3 text-center border-b border-slate-700 pb-2">{{ $teamsPreview[$t2]['name'] }}</h3>
                                    <ul class="text-sm space-y-2">
                                        <li class="flex justify-between"><span class="text-gray-400">M. Senior</span> <span class="text-white font-bold">{{ $teamsPreview[$t2]['male_senior']->name ?? 'Menunggu...' }}</span></li>
                                        <li class="flex justify-between"><span class="text-gray-400">Female</span> <span class="text-white font-bold">{{ $teamsPreview[$t2]['female']->name ?? 'Menunggu...' }}</span></li>
                                        <li class="flex justify-between"><span class="text-gray-400">M. Junior</span> <span class="text-white font-bold">{{ $teamsPreview[$t2]['male_junior']->name ?? 'Menunggu...' }}</span></li>
                                        <li class="flex justify-between"><span class="text-gray-400">Advance</span> <span class="text-white font-bold">{{ $teamsPreview[$t2]['advance']->name ?? 'Menunggu...' }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection