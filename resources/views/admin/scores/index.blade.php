@extends('layouts.app')

@section('content')
<div x-data="{ showModal: false, modalImage: '', modalScore: '', modalUser: '', modalId: '', modalActionUrl: '' }" class="max-w-7xl mx-auto px-4 py-12">
    
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-rginc-gold flex items-center gap-2 text-sm font-semibold w-fit">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Dashboard Admin
        </a>
    </div>

    <h1 class="text-3xl font-bold text-white mb-6">Verifikasi Skor Peserta</h1>

    <!-- Filter Tab -->
    <div class="bg-slate-800 p-4 rounded-xl mb-6 flex gap-4">
        <a href="{{ route('admin.scores.index') }}" class="px-4 py-2 rounded {{ !request('status') ? 'bg-rginc-gold text-rginc-navy font-bold' : 'text-gray-300 bg-slate-700' }}">Semua</a>
        <a href="{{ route('admin.scores.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded {{ request('status') == 'pending' ? 'bg-yellow-500 text-slate-900 font-bold' : 'text-gray-300 bg-slate-700' }}">Perlu Verifikasi</a>
        <a href="{{ route('admin.scores.index', ['status' => 'approved']) }}" class="px-4 py-2 rounded {{ request('status') == 'approved' ? 'bg-green-500 text-slate-900 font-bold' : 'text-gray-300 bg-slate-700' }}">Approved</a>
    </div>

    <div class="bg-slate-800/50 border border-slate-700 rounded-xl overflow-hidden shadow-xl">
        <table class="w-full text-left">
            <thead class="bg-slate-900 text-gray-400 text-sm uppercase">
                <tr>
                    <th class="p-4">Peserta & Kategori</th>
                    <th class="p-4">Lagu</th>
                    <th class="p-4 font-mono">Skor (Angka)</th>
                    <th class="p-4 text-center">Waktu Input</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-center">Aksi / Bukti</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                @forelse($scores as $s)
                <tr class="hover:bg-slate-800/80 text-white">
                    <td class="p-4">
                        <div class="font-bold">{{ $s->participant->name }}</div>
                        <div class="text-xs text-rginc-gold">{{ $s->participant->category->name }}</div>
                    </td>
                    <td class="p-4">{{ $s->song->title }} - {{ $s->song->level }}</td>
                    <td class="p-4 font-bold text-lg font-mono text-green-400">{{ number_format($s->score_value) }}</td>
                    <td class="p-4 text-center text-sm text-gray-400">{{ $s->created_at->format('d M Y, H:i') }}</td>
                    <td class="p-4 text-center">
                        @if($s->status == 'approved')
                            <span class="bg-green-500/20 text-green-400 px-2 py-1 rounded text-xs font-bold">Approved</span>
                        @elseif($s->status == 'rejected')
                            <span class="bg-red-500/20 text-red-400 px-2 py-1 rounded text-xs font-bold">Rejected</span>
                        @else
                            <span class="bg-yellow-500/20 text-yellow-400 px-2 py-1 rounded text-xs font-bold animate-pulse">Pending</span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <button type="button" 
                            @click="showModal = true; 
                                    modalImage = '{{ asset('storage/' . $s->proof_image_path) }}'; 
                                    modalUser = '{{ addslashes($s->participant->name) }}'; 
                                    modalScore = '{{ number_format($s->score_value) }}';
                                    modalActionUrl = '{{ route('admin.scores.verify', $s->id) }}';"
                            class="bg-blue-600 hover:bg-blue-500 text-white text-xs px-4 py-2 rounded font-bold transition shadow-lg">
                            Cek Bukti & Verifikasi
                        </button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-8 text-center text-gray-400">Tidak ada data skor.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 bg-slate-900 border-t border-slate-700">{{ $scores->links() }}</div>
    </div>

    <!-- ================= MODAL BUKTI & VERIFIKASI ================= -->
    <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" x-transition>
        <div class="bg-slate-900 border border-slate-700 rounded-2xl w-full max-w-2xl overflow-hidden shadow-2xl" @click.away="showModal = false">
            <div class="p-4 border-b border-slate-700 flex justify-between items-center bg-slate-950">
                <div>
                    <h3 class="text-xl font-bold text-white">Verifikasi Bukti Skor</h3>
                    <p class="text-sm text-gray-400">Peserta: <span class="text-rginc-gold font-bold" x-text="modalUser"></span> | Skor Input: <span class="text-green-400 font-mono font-bold" x-text="modalScore"></span></p>
                </div>
                <button @click="showModal = false" class="text-gray-400 hover:text-white">✖</button>
            </div>
            
            <div class="p-6 bg-slate-800 flex justify-center">
                <!-- Gambar Bukti Skor -->
                <img :src="modalImage" alt="Bukti Skor" class="max-h-[60vh] object-contain rounded shadow-lg border border-slate-700">
            </div>
            
            <div class="p-4 border-t border-slate-700 bg-slate-950 flex gap-4 justify-end">
                <!-- Tombol Reject -->
                <form :action="modalActionUrl" method="POST">
                    @csrf @method('PATCH')
                    <input type="hidden" name="status" value="rejected">
                    <button type="button" 
                        onclick="confirmAction(event, 'Tolak Skor Ini?', 'Peserta tidak akan masuk ke leaderboard untuk skor ini.', 'Ya, Tolak Skor', '#ef4444')" 
                        class="bg-red-600 hover:bg-red-500 text-white font-bold px-6 py-2.5 rounded-lg transition">
                        Tolak (Reject)
                    </button>
                </form>

                <!-- Tombol Approve -->
                <form :action="modalActionUrl" method="POST">
                    @csrf @method('PATCH')
                    <input type="hidden" name="status" value="approved">
                    <button type="button" 
                        onclick="confirmAction(event, 'Sahkan Skor Ini?', 'Skor akan otomatis masuk ke klasemen (Leaderboard).', 'Ya, Sahkan', '#22c55e')" 
                        class="bg-green-600 hover:bg-green-500 text-white font-bold px-6 py-2.5 rounded-lg transition">
                        Sah (Approve)
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection