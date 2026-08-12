@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="bg-slate-800/50 border border-rginc-gold/30 rounded-2xl p-8 shadow-2xl backdrop-blur-sm relative overflow-hidden">
        <!-- Aksen Emas di atas Card -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-rginc-gold to-transparent"></div>

        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-rginc-gold">Formulir Pendaftaran</h2>
            <p class="text-gray-400 mt-2">Lengkapi data diri Anda dengan benar sesuai identitas.</p>
        </div>

        {{-- Notifikasi Error/Sukses --}}
        @if(session('error'))
            <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" id="registerForm" onsubmit="showLoading(event)" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-rginc-gold focus:ring-1 focus:ring-rginc-gold transition">
                    @error('name') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Username IG -->
                <div>
                    <label class="flex items-center gap-2 text-sm font-medium text-gray-300 mb-2">
                        Username Instagram
                        
                        <!-- Icon & Tooltip Wrapper -->
                        <div class="relative group cursor-pointer flex items-center">
                            <!-- Ikon Info (SVG) -->
                            <svg class="w-4 h-4 text-gray-500 group-hover:text-rginc-gold transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            
                            <!-- Kotak Tooltip (Muncul saat di-hover) -->
                            <!-- Tambahan: w-[220px] dan max-w-none untuk mencegah teks menyusut, serta posisi digeser ke kiri (right-0 md:left-1/2) -->
                            <div class="absolute bottom-full right-0 md:left-1/2 md:transform md:-translate-x-1/2 mb-2 w-[220px] max-w-none p-3 bg-slate-800 border border-slate-600 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 text-center">
                                <p class="text-xs text-gray-300 font-normal leading-relaxed">
                                    Cantumkan username Instagram sesuai dengan akun yang akan digunakan untuk upload bukti skor nantinya.
                                </p>
                                <!-- Segitiga Panah Bawah -->
                                <div class="absolute top-full right-[6px] md:right-auto md:left-1/2 transform md:-translate-x-1/2 border-[6px] border-transparent border-t-slate-800"></div>
                                <!-- Segitiga Panah Bawah (Border Luar) -->
                                <div class="absolute top-full right-[5px] md:right-auto md:left-1/2 transform md:-translate-x-1/2 border-[7px] border-transparent border-t-slate-600 -z-10 mt-[1px]"></div>
                            </div>
                        </div>
                    </label>
                    
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">@</span>
                        <input type="text" name="ig_username" value="{{ old('ig_username') }}" required 
                            class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-9 pr-4 py-2.5 text-white focus:outline-none focus:border-rginc-gold focus:ring-1 focus:ring-rginc-gold transition shadow-inner">
                    </div>
                    @error('ig_username') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor WhatsApp -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nomor HP (WhatsApp)</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required placeholder="0812xxxxxxx"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-rginc-gold focus:ring-1 focus:ring-rginc-gold transition">
                    @error('whatsapp_number') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-rginc-gold focus:ring-1 focus:ring-rginc-gold transition">
                    @error('email') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- ID AM.Pass -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">ID AM.Pass</label>
                    <input type="text" name="am_pass_id" value="{{ old('am_pass_id') }}" required 
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-rginc-gold focus:ring-1 focus:ring-rginc-gold transition">
                    @error('am_pass_id') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Kategori Lomba -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Kategori Lomba</label>
                    <select name="category_id" required 
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-rginc-gold focus:ring-1 focus:ring-rginc-gold transition appearance-none">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Syarat & Ketentuan -->
            <div class="pt-4">
                <label class="flex items-start gap-3 cursor-pointer">
                    <input type="checkbox" name="terms" required class="mt-1 w-5 h-5 accent-rginc-gold bg-slate-900 border-slate-700 rounded">
                    <span class="text-sm text-gray-300">
                        Saya menyetujui seluruh <a href="{{ route('rules') }}" target="_blank" class="text-rginc-gold hover:underline">Syarat dan Ketentuan</a> kompetisi ini.
                    </span>
                </label>
                @error('terms') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- TOMBOL SUBMIT DENGAN LOADING STATE -->
            <button type="submit" id="submitBtn" class="w-full bg-rginc-gold text-rginc-navy font-black py-4 rounded-xl text-lg uppercase tracking-wider hover:bg-yellow-400 transition-all shadow-[0_0_20px_rgba(212,175,55,0.4)] flex justify-center items-center gap-3">
                <span id="btnText">Daftar Sekarang</span>
                <svg id="btnSpinner" class="hidden animate-spin h-6 w-6 text-rginc-navy" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </form>
    </div>
</div>
<script>
    function showLoading(event) {
        // Ambil elemen tombol, teks, dan spinner
        const btn = document.getElementById('submitBtn');
        const text = document.getElementById('btnText');
        const spinner = document.getElementById('btnSpinner');

        // Nonaktifkan tombol agar tidak bisa di-klik lagi (mencegah double submit)
        btn.disabled = true;
        
        // Ubah tampilan tombol menjadi pudar (disabled state)
        btn.classList.remove('hover:bg-yellow-400');
        btn.classList.add('opacity-75', 'cursor-wait', 'bg-yellow-500');
        
        // Ubah teks dan tampilkan animasi putaran (spinner)
        text.innerText = 'Memproses Pendaftaran...';
        spinner.classList.remove('hidden');
    }
</script>
@endsection