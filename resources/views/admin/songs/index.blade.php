@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-rginc-gold flex items-center gap-2 text-sm font-semibold transition w-fit">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Dashboard Admin
        </a>
    </div>
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <h1 class="text-3xl font-bold text-white uppercase tracking-wider">Manajemen Lagu Lomba</h1>
        <a href="{{ route('admin.songs.create') }}" class="bg-rginc-gold text-rginc-navy font-bold px-6 py-3 rounded-lg hover:bg-yellow-500 transition shadow-lg shadow-rginc-gold/10 whitespace-nowrap">
            + Tambah Lagu Baru
        </a>
    </div>

    <!-- FITUR SEARCH & FILTER -->
    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700 mb-6 shadow-md">
        <form action="{{ route('admin.songs.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <!-- Search Title -->
            <div class="flex-grow">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul lagu..." class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-rginc-gold focus:outline-none">
            </div>
            
            <!-- Filter Kategori -->
            <div class="w-full md:w-48">
                <select name="category_id" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-rginc-gold focus:outline-none">
                    <option value="">Semua Kategori</option>
                    @foreach(\App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Babak -->
            <div class="w-full md:w-40">
                <select name="round" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-rginc-gold focus:outline-none">
                    <option value="">Semua Babak</option>
                    <option value="preliminary" {{ request('round') == 'preliminary' ? 'selected' : '' }}>Preliminary</option>
                    <option value="semifinal" {{ request('round') == 'semifinal' ? 'selected' : '' }}>Semifinal</option>
                    <option value="final" {{ request('round') == 'final' ? 'selected' : '' }}>Final</option>
                </select>
            </div>

            <!-- Filter Status -->
            <div class="w-full md:w-36">
                <select name="is_active" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-rginc-gold focus:outline-none">
                    <option value="">Status</option>
                    <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <!-- Tombol Submit & Reset -->
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-5 py-2.5 rounded-lg font-bold transition">Cari</button>
                @if(request()->anyFilled(['search', 'category_id', 'round', 'is_active', 'sort']))
                    <a href="{{ route('admin.songs.index') }}" class="bg-slate-700 hover:bg-slate-600 text-white px-5 py-2.5 rounded-lg font-bold transition">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <div class="bg-slate-800/50 border border-slate-700 rounded-xl overflow-hidden shadow-xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-900 text-gray-400 text-sm uppercase border-b border-slate-700">
                <tr>
                    <th class="p-4 w-16 text-center">No</th>
                    <!-- Header Tabel yang bisa diklik untuk Sorting -->
                    <th class="p-4">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'title', 'direction' => request('sort') == 'title' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white">
                            Lagu 
                            @if(request('sort') == 'title')
                                <span>{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'level', 'direction' => request('sort') == 'level' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white">
                            Level
                            @if(request('sort') == 'level')
                                <span>{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </th>
                    <th class="p-4">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'round', 'direction' => request('sort') == 'round' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white">
                            Babak
                            @if(request('sort') == 'round')
                                <span>{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                @forelse($songs as $index => $song)
                <tr class="hover:bg-slate-800/80 text-white">
                    <td class="p-4 text-center font-mono text-gray-400">
                        {{ $songs->firstItem() + $index }}
                    </td>
                    <td class="p-4 font-bold">{{ $song->title }}</td>
                    <td class="p-4">{{ $song->category->name }}</td>
                    <td class="p-4 font-mono text-rginc-gold">{{ $song->level }}</td>
                    <td class="p-4 capitalize">{{ str_replace('_', ' ', $song->round) }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded text-xs font-bold {{ $song->is_active ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                            {{ $song->is_active ? 'AKTIF' : 'NONAKTIF' }}
                        </span>
                    </td>
                    <td class="p-4 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.songs.edit', $song->id) }}" class="text-blue-400 hover:text-blue-300 font-semibold text-sm">Edit</a>
                        <form action="{{ route('admin.songs.destroy', $song->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="button" 
                                onclick="confirmAction(event, 'Hapus Lagu Ini?', 'Skor peserta yang menggunakan lagu ini mungkin akan ikut terpengaruh.', 'Ya, Hapus Lagu', '#ef4444')" 
                                class="text-red-400 hover:text-red-300 font-semibold text-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-400">Belum ada data lagu yang sesuai dengan pencarian Anda.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4 bg-slate-900 border-t border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-sm text-gray-400">
                Menampilkan 
                <span class="font-bold text-white">{{ $songs->firstItem() ?? 0 }}</span> 
                sampai 
                <span class="font-bold text-white">{{ $songs->lastItem() ?? 0 }}</span> 
                dari total 
                <span class="font-bold text-white">{{ $songs->total() }}</span> 
                lagu
            </div>
            <div>
                <!-- Tambahkan appends() agar parameter filter/sort tidak hilang saat pindah halaman paginasi -->
                {{ $songs->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection