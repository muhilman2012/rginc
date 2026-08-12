@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('admin.participants.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2 w-fit transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Peserta
        </a>
    </div>

    <h1 class="text-2xl font-bold text-white mb-6">Edit Data Peserta</h1>
    
    <div class="bg-slate-800 p-8 rounded-xl border border-slate-700 shadow-xl">
        
        <!-- Tampilkan pesan error validasi jika ada -->
        @if ($errors->any())
            <div class="bg-red-500/20 text-red-400 p-4 rounded-lg mb-6 border border-red-500/30">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.participants.update', $participant->id) }}" method="POST" class="space-y-5">
            @csrf 
            @method('PUT')
            
            <div>
                <label class="block text-gray-300 mb-2 font-semibold">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $participant->name) }}" required class="w-full bg-slate-900 p-3 rounded-lg text-white border border-slate-700 focus:border-rginc-gold focus:outline-none transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-300 mb-2 font-semibold">Username IG</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-400 bg-slate-700 border border-r-0 border-slate-700 rounded-l-lg">@</span>
                        <input type="text" name="ig_username" value="{{ old('ig_username', $participant->ig_username) }}" required class="w-full bg-slate-900 p-3 rounded-none rounded-r-lg text-white border border-slate-700 focus:border-rginc-gold focus:outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-300 mb-2 font-semibold">No. WhatsApp</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $participant->whatsapp_number) }}" required class="w-full bg-slate-900 p-3 rounded-lg text-white border border-slate-700 focus:border-rginc-gold focus:outline-none transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-300 mb-2 font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $participant->email) }}" required class="w-full bg-slate-900 p-3 rounded-lg text-white border border-slate-700 focus:border-rginc-gold focus:outline-none transition">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2 font-semibold">AM.Pass ID</label>
                    <input type="text" name="am_pass_id" value="{{ old('am_pass_id', $participant->am_pass_id) }}" required class="w-full bg-slate-900 p-3 rounded-lg text-white font-mono border border-slate-700 focus:border-rginc-gold focus:outline-none transition">
                </div>
            </div>
            
            <div>
                <label class="block text-gray-300 mb-2 font-semibold">Kategori Kompetisi</label>
                <select name="category_id" required class="w-full bg-slate-900 p-3 rounded-lg text-white border border-slate-700 focus:border-rginc-gold focus:outline-none transition">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $participant->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="w-full bg-rginc-gold text-rginc-navy font-black py-4 rounded-lg mt-6 hover:bg-yellow-500 transition shadow-[0_0_15px_rgba(212,175,55,0.3)]">
                SIMPAN PERUBAHAN
            </button>
        </form>
    </div>
</div>
@endsection