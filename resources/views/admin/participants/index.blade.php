@extends('layouts.app')

@section('content')
<!-- Kita bungkus dengan x-data Alpine.js untuk fitur Modal Detail -->
<div x-data="{ showModal: false, pDetail: {} }" class="max-w-7xl mx-auto px-4 py-12">
    
    <!-- Tombol Kembali ke Dashboard -->
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-rginc-gold flex items-center gap-2 text-sm font-semibold transition w-fit">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Dashboard Admin
        </a>
    </div>

    <h1 class="text-3xl font-bold text-white mb-6">Daftar Peserta Kompetisi</h1>

    <!-- FITUR SEARCH & FILTER -->
    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700 mb-6 shadow-md">
        <form action="{{ route('admin.participants.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <!-- Search Title -->
            <div class="flex-grow">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama, IG, atau AM.Pass ID..." class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-rginc-gold focus:outline-none">
            </div>
            
            <!-- Filter Kategori -->
            <div class="w-full md:w-64">
                <select name="category_id" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-rginc-gold focus:outline-none">
                    <option value="">Semua Kategori</option>
                    @foreach(\App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Submit & Reset -->
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-5 py-2.5 rounded-lg font-bold transition">Cari</button>
                @if(request()->anyFilled(['search', 'category_id', 'sort']))
                    <a href="{{ route('admin.participants.index') }}" class="bg-slate-700 hover:bg-slate-600 text-white px-5 py-2.5 rounded-lg font-bold transition">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <!-- TABEL PESERTA -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl overflow-hidden shadow-xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-900 text-gray-400 text-sm uppercase border-b border-slate-700">
                <tr>
                    <th class="p-4 w-16 text-center">No</th>
                    <th class="p-4">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('sort') == 'name' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white">
                            Nama / IG
                            @if(request('sort') == 'name') <span>{{ request('direction') == 'asc' ? '↑' : '↓' }}</span> @endif
                        </a>
                    </th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'am_pass_id', 'direction' => request('sort') == 'am_pass_id' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white">
                            AM.Pass ID
                            @if(request('sort') == 'am_pass_id') <span>{{ request('direction') == 'asc' ? '↑' : '↓' }}</span> @endif
                        </a>
                    </th>
                    <th class="p-4">Waktu Daftar</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                @forelse($participants as $index => $p)
                <tr class="hover:bg-slate-800/80 text-white">
                    <td class="p-4 text-center font-mono text-gray-400">{{ $participants->firstItem() + $index }}</td>
                    <td class="p-4">
                        <div class="font-bold">{{ $p->name }}</div>
                        <div class="text-xs text-rginc-gold">@ {{ $p->ig_username }}</div>
                    </td>
                    <td class="p-4">{{ $p->category->name }}</td>
                    <td class="p-4 font-mono text-sm text-gray-300">{{ $p->am_pass_id }}</td>
                    <td class="p-4 text-sm text-gray-400">{{ $p->created_at->format('d M Y, H:i') }}</td>
                    <td class="p-4 text-center flex justify-center items-center gap-2">
                        <!-- Tombol Detail (Memicu Modal Alpine.js) -->
                        <button type="button" 
                            @click="pDetail = { name: '{{ addslashes($p->name) }}', ig: '{{ addslashes($p->ig_username) }}', ampass: '{{ addslashes($p->am_pass_id) }}', category: '{{ addslashes($p->category->name) }}', wa: '{{ addslashes($p->whatsapp_number) }}', email: '{{ addslashes($p->email) }}', date: '{{ $p->created_at->format('d M Y, H:i') }}' }; showModal = true"
                            class="bg-blue-600 hover:bg-blue-500 text-white text-xs px-3 py-1.5 rounded font-bold transition">
                            Detail
                        </button>
                        
                        <a href="{{ route('admin.participants.edit', $p->id) }}" class="bg-slate-700 hover:bg-slate-600 text-white text-xs px-3 py-1.5 rounded font-bold transition">Edit</a>
                        
                        <form action="{{ route('admin.participants.destroy', $p->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="button" 
                                onclick="confirmAction(event, 'Hapus Peserta?', 'Semua data dan skor milik peserta ini akan terhapus permanen!', 'Ya, Hapus Data', '#ef4444')" 
                                class="bg-red-600 hover:bg-red-500 text-white text-xs px-3 py-1.5 rounded font-bold transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">Tidak ada data peserta ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="p-4 bg-slate-900 border-t border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-sm text-gray-400">
                Menampilkan <span class="font-bold text-white">{{ $participants->firstItem() ?? 0 }}</span> - <span class="font-bold text-white">{{ $participants->lastItem() ?? 0 }}</span> dari total <span class="font-bold text-white">{{ $participants->total() }}</span> peserta
            </div>
            <div>
                {{ $participants->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <!-- ================= MODAL POPUP DETAIL PESERTA ================= -->
    <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
        <div class="bg-slate-900 border border-rginc-gold/30 rounded-2xl p-6 w-full max-w-md shadow-2xl" @click.away="showModal = false">
            <div class="flex justify-between items-center mb-6 border-b border-slate-700 pb-3">
                <h3 class="text-xl font-bold text-white">Detail Peserta</h3>
                <button @click="showModal = false" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <div class="space-y-4 text-sm">
                <div><span class="block text-gray-500 font-semibold">Nama Lengkap</span><span class="text-white font-bold text-lg" x-text="pDetail.name"></span></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><span class="block text-gray-500 font-semibold">Kategori</span><span class="text-rginc-gold font-bold" x-text="pDetail.category"></span></div>
                    <div><span class="block text-gray-500 font-semibold">AM.Pass ID</span><span class="text-white font-mono" x-text="pDetail.ampass"></span></div>
                    <div><span class="block text-gray-500 font-semibold">Username IG</span><span class="text-white" x-text="'@' + pDetail.ig"></span></div>
                    <div><span class="block text-gray-500 font-semibold">WhatsApp</span><span class="text-white" x-text="pDetail.wa"></span></div>
                </div>
                <div><span class="block text-gray-500 font-semibold">Email</span><span class="text-white" x-text="pDetail.email"></span></div>
                <div><span class="block text-gray-500 font-semibold">Waktu Mendaftar</span><span class="text-white" x-text="pDetail.date"></span></div>
            </div>
            
            <div class="mt-8">
                <button @click="showModal = false" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 rounded-lg border border-slate-600 transition">Tutup Detail</button>
            </div>
        </div>
    </div>

</div>
@endsection