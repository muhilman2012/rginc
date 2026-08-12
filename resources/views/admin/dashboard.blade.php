@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    
    <!-- Header Dashboard -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-black text-white uppercase tracking-wider">Control Panel <span class="text-rginc-gold">M81</span></h1>
            <p class="text-gray-400 mt-1">Selamat datang kembali, kelola turnamen Pump It Up dengan mudah.</p>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500/10 border border-red-500/50 text-red-500 hover:bg-red-500 hover:text-white font-bold px-6 py-2.5 rounded-lg transition">
                Logout
            </button>
        </form>
    </div>

    <!-- Metrik Statistik Utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Card 1: Total Peserta -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700 shadow-lg relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 text-slate-700 opacity-20 group-hover:scale-110 transition duration-500">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <h3 class="text-gray-400 text-sm font-semibold relative z-10">Total Pendaftar</h3>
            <p class="text-4xl font-black text-white mt-2 relative z-10">{{ $totalParticipants }}</p>
        </div>

        <!-- Card 2: Skor Pending (Penting/Warning) -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-yellow-500/40 shadow-[0_0_15px_rgba(234,179,8,0.1)] relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 text-yellow-500/10 group-hover:scale-110 transition duration-500">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M11 15h2v2h-2zm0-8h2v6h-2zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>
            </div>
            <h3 class="text-yellow-400 text-sm font-semibold relative z-10">Skor Butuh Verifikasi</h3>
            <p class="text-4xl font-black text-yellow-500 mt-2 relative z-10">{{ $pendingScores }}</p>
        </div>

        <!-- Card 3: Skor Approved -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-green-500/30 shadow-lg relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 text-green-500/10 group-hover:scale-110 transition duration-500">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
            </div>
            <h3 class="text-green-400 text-sm font-semibold relative z-10">Skor Tervalidasi</h3>
            <p class="text-4xl font-black text-green-400 mt-2 relative z-10">{{ $approvedScores }}</p>
        </div>

        <!-- Card 4: Total Lagu -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700 shadow-lg relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 text-slate-700 opacity-20 group-hover:scale-110 transition duration-500">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
            </div>
            <h3 class="text-gray-400 text-sm font-semibold relative z-10">Total Lagu Event</h3>
            <p class="text-4xl font-black text-rginc-gold mt-2 relative z-10">{{ $totalSongs }}</p>
        </div>
    </div>

    <h2 class="text-xl font-bold text-white mb-6 border-b border-slate-700 pb-2">Menu Utama Panel Admin</h2>

    <!-- Grid Menu Navigasi -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Menu: Verifikasi Skor -->
        <a href="{{ route('admin.scores.index') }}" class="block bg-gradient-to-br from-slate-800 to-slate-900 border {{ $pendingScores > 0 ? 'border-yellow-500' : 'border-slate-700' }} rounded-2xl p-6 hover:-translate-y-2 hover:shadow-xl hover:shadow-yellow-500/10 transition-all duration-300">
            <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center mb-4 text-yellow-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-1">Verifikasi Skor</h3>
            <p class="text-sm text-gray-400">Cek bukti foto dan sahkan skor peserta yang masuk.</p>
        </a>

        <!-- Menu: Data Peserta -->
        <a href="{{ route('admin.participants.index') }}" class="block bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 rounded-2xl p-6 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 hover:border-rginc-gold">
            <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center mb-4 text-blue-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-1">Database Peserta</h3>
            <p class="text-sm text-gray-400">Lihat, cari, dan kelola data seluruh pendaftar event.</p>
        </a>

        <!-- Menu: Manajemen Lagu -->
        <a href="{{ route('admin.songs.index') }}" class="block bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 rounded-2xl p-6 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 hover:border-rginc-gold">
            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mb-4 text-purple-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-1">Daftar Lagu</h3>
            <p class="text-sm text-gray-400">Kelola lagu aktif, babak, dan level untuk input peserta.</p>
        </a>

        <!-- Menu: Auto-Grouping -->
        <a href="{{ route('admin.teams.index') }}" class="block bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 rounded-2xl p-6 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 hover:border-rginc-gold">
            <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4 text-emerald-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-1">Generate Tim</h3>
            <p class="text-sm text-gray-400">Sistem otomatis acak tim semifinal berdasarkan ranking.</p>
        </a>

    </div>
</div>
@endsection