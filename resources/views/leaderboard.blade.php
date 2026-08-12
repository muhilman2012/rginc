@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
    
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-2">LIVE LEADERBOARD</h1>
        <h2 class="text-xl md:text-2xl text-rginc-gold tracking-widest uppercase font-semibold">{{ $roundTitle }}</h2>
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-3 mb-8">
        @foreach($categories as $category)
            <a href="{{ route('leaderboard.show', $category->slug) }}" 
               class="px-6 py-2 rounded-full text-sm font-bold transition border 
               {{ $activeSlug === $category->slug 
                    ? 'bg-rginc-gold text-rginc-navy border-rginc-gold shadow-[0_0_15px_rgba(212,175,55,0.4)]' 
                    : 'bg-slate-800 text-gray-300 border-slate-600 hover:border-rginc-gold hover:text-rginc-gold' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Tabel Klasemen -->
    <div class="bg-slate-800/50 border border-rginc-gold/30 rounded-2xl overflow-hidden shadow-2xl backdrop-blur-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 border-b border-rginc-gold/20 text-gray-400 text-sm uppercase tracking-wider">
                        <th class="p-4 md:p-6 w-20 text-center font-medium">Rank</th>
                        <th class="p-4 md:p-6 font-medium">Pemain</th>
                        <th class="p-4 md:p-6 font-medium hidden md:table-cell">ID AM.Pass</th>
                        <th class="p-4 md:p-6 text-right font-medium">Skor Tertinggi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($leaderboardData as $index => $player)
                        <tr class="hover:bg-slate-800/80 transition group">
                            <!-- Kolom Ranking -->
                            <td class="p-4 md:p-6 text-center">
                                @if($index == 0)
                                    <div class="w-10 h-10 mx-auto rounded-full bg-yellow-500 text-slate-900 flex items-center justify-center font-bold text-lg shadow-[0_0_10px_rgba(234,179,8,0.5)]">1</div>
                                @elseif($index == 1)
                                    <div class="w-10 h-10 mx-auto rounded-full bg-gray-300 text-slate-900 flex items-center justify-center font-bold text-lg shadow-[0_0_10px_rgba(209,213,219,0.5)]">2</div>
                                @elseif($index == 2)
                                    <div class="w-10 h-10 mx-auto rounded-full bg-[#CD7F32] text-white flex items-center justify-center font-bold text-lg shadow-[0_0_10px_rgba(205,127,50,0.5)]">3</div>
                                @else
                                    <span class="text-gray-400 font-bold text-lg group-hover:text-white transition">{{ $index + 1 }}</span>
                                @endif
                            </td>

                            <!-- Kolom Nama -->
                            <td class="p-4 md:p-6">
                                <div class="font-bold text-white text-lg">{{ $player->name }}</div>
                                <span class="bg-blue-500/20 text-blue-400 text-xs px-2 py-0.5 rounded border border-blue-500/30 flex items-center gap-1">
                                    ✓ Verified Score
                                </span>
                                <div class="text-sm text-gray-400">
                                    <span class="text-rginc-gold mr-2">{{ '@' . $player->ig_username }}</span>
                                </div>
                            </td>

                            <!-- Kolom AM Pass (Hidden on mobile) -->
                            <td class="p-4 md:p-6 hidden md:table-cell">
                                <span class="bg-slate-900 px-3 py-1 rounded text-sm font-mono text-gray-300 border border-slate-700">
                                    {{ $player->am_pass_id }}
                                </span>
                            </td>

                            <!-- Kolom Skor -->
                            <td class="p-4 md:p-6 text-right">
                                <span class="font-black text-2xl tracking-tight 
                                    {{ $index == 0 ? 'text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-600' : 'text-white' }}">
                                    {{ number_format($player->highest_score, 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 mb-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <p class="text-lg">Belum ada skor yang masuk untuk kategori ini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection