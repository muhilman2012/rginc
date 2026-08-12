@extends('layouts.app')

@section('content')
<!-- ================= HERO SECTION ================= -->
<div class="relative overflow-hidden min-h-[85vh] flex items-center justify-center border-b border-rginc-gold/20">
    <!-- Ornamen Lingkaran Emas di Background -->
    <div class="absolute -top-40 -right-40 w-[500px] h-[500px] bg-rginc-gold/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 -left-20 w-80 h-80 bg-rginc-gold/10 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-blue-900/5 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center w-full mt-10">
        <div class="mb-6 inline-block">
            <img src="{{ asset('logo/M81_logo.png') }}" alt="M81 Logo" class="h-20 md:h-28 lg:h-36 w-auto drop-shadow-[0_0_15px_rgba(220,38,38,0.4)] transition-transform duration-300 hover:scale-105">
        </div>

        <h1 class="text-4xl md:text-4xl lg:text-6xl font-black text-rginc-gold tracking-widest uppercase mb-4 leading-none">
            RGINC MIGHTY ONE!!!
        </h1>

        <h2 class="text-2xl md:text-4xl font-extrabold tracking-tight mb-8">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-400 uppercase">
                RGINC PUMP IT UP ONLINE COMPETITION
            </span> 
            <span class="text-rginc-gold ml-2">2026</span>
        </h2>
        
        <p class="mt-4 text-lg md:text-xl text-gray-400 max-w-2xl mx-auto mb-12 font-medium">
            Tunjukkan stamina dan refleks terbaikmu di ajang bergengsi perayaan Anniversary RGinc & Semarak Kemerdekaan RI ke-81!
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('register') }}" class="group relative bg-rginc-gold text-rginc-navy px-8 py-4 rounded-lg font-bold text-lg hover:bg-yellow-500 transition-all shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_30px_rgba(212,175,55,0.6)] hover:-translate-y-1 overflow-hidden">
                <span class="relative z-10">DAFTAR SEKARANG</span>
                <div class="absolute inset-0 -translate-x-full bg-white/30 group-hover:animate-[shimmer_1.5s_infinite] skew-x-12 w-1/2"></div>
            </a>
            <a href="#kategori" class="border-2 border-slate-600 text-gray-300 px-8 py-4 rounded-lg font-bold text-lg hover:border-rginc-gold hover:text-rginc-gold transition hover:bg-rginc-gold/5">
                PELAJARI LEBIH LANJUT
            </a>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce hidden md:block">
        <svg class="w-8 h-8 text-rginc-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
    </div>
</div>

<!-- ================= KATEGORI & LEVEL SECTION ================= -->
<div id="kategori" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-white uppercase tracking-wider">Kategori Lomba</h2>
        <div class="w-24 h-1 bg-rginc-gold mx-auto mt-4 rounded"></div>
        <p class="mt-4 text-gray-400">Pilih kategori yang paling sesuai dengan batas kemampuanmu.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card Advance -->
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-rginc-gold/50 transition group">
            <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4 border border-slate-600 group-hover:border-rginc-gold transition">
                <svg class="w-6 h-6 text-rginc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Advance</h3>
            <p class="text-sm text-gray-400 mb-4">Cocok untuk pemain menengah yang ingin menguji konsistensi.</p>
            <div class="bg-slate-900 p-3 rounded border border-slate-700">
                <span class="text-xs text-gray-500 block mb-1">Estimasi Level:</span>
                <span class="font-mono text-rginc-gold font-bold">Level 14 - 18</span>
            </div>
        </div>

        <!-- Card Speed Female -->
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-rginc-gold/50 transition group">
            <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4 border border-slate-600 group-hover:border-rginc-gold transition">
                <svg class="w-6 h-6 text-rginc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Speed Female</h3>
            <p class="text-sm text-gray-400 mb-4">Kategori khusus bagi para srikandi PIU yang siap beradu kecepatan.</p>
            <div class="bg-slate-900 p-3 rounded border border-slate-700">
                <span class="text-xs text-gray-500 block mb-1">Estimasi Level:</span>
                <span class="font-mono text-rginc-gold font-bold">Level 16 - 21</span>
            </div>
        </div>

        <!-- Card Speed Male Junior -->
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-rginc-gold/50 transition group">
            <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4 border border-slate-600 group-hover:border-rginc-gold transition">
                <svg class="w-6 h-6 text-rginc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Speed Male Junior</h3>
            <p class="text-sm text-gray-400 mb-4">Uji kecepatan kakimu menuju level profesional berikutnya.</p>
            <div class="bg-slate-900 p-3 rounded border border-slate-700">
                <span class="text-xs text-gray-500 block mb-1">Estimasi Level:</span>
                <span class="font-mono text-rginc-gold font-bold">Level 17 - 22</span>
            </div>
        </div>

        <!-- Card Speed Male Senior -->
        <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-rginc-gold/50 transition group">
            <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4 border border-slate-600 group-hover:border-rginc-gold transition">
                <svg class="w-6 h-6 text-rginc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Speed Male Senior</h3>
            <p class="text-sm text-gray-400 mb-4">Kelas tertinggi bagi para monster PIU. Buktikan siapa yang tercepat!</p>
            <div class="bg-slate-900 p-3 rounded border border-slate-700">
                <span class="text-xs text-gray-500 block mb-1">Estimasi Level:</span>
                <span class="font-mono text-rginc-gold font-bold">Level 20 - 25</span>
            </div>
        </div>
    </div>
</div>

<!-- ================= RINGKASAN ATURAN ================= -->
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-slate-800/50 p-8 md:p-12 rounded-3xl border border-rginc-gold/30 relative overflow-hidden flex flex-col md:flex-row items-center gap-10 shadow-2xl">
        <div class="absolute top-0 right-0 w-40 h-40 bg-rginc-gold/5 rounded-full blur-3xl"></div>
        
        <!-- Logo Phoenix 2 Pengganti Ikon Buku -->
        <div class="flex-shrink-0">
            <div class="w-24 h-24 md:w-28 md:h-28 bg-slate-900 rounded-2xl flex items-center justify-center border border-rginc-gold/40 shadow-[0_0_20px_rgba(212,175,55,0.15)] p-3 relative group">
                <div class="absolute inset-0 bg-rginc-gold/5 rounded-2xl group-hover:bg-rginc-gold/10 transition"></div>
                <img src="{{ asset('logo/phoenix2.png') }}" alt="PIU Phoenix 2 Logo" class="w-full h-full object-contain relative z-10 drop-shadow-md">
            </div>
        </div>

        <!-- Teks Informasi & Ringkasan Peraturan -->
        <div class="flex-grow text-center md:text-left">
            <h2 class="text-3xl font-bold text-white mb-3">Pahami Aturan Main</h2>
            <p class="text-gray-400 text-sm mb-6">Pastikan kamu mematuhi regulasi dasar berikut sebelum melakukan pendaftaran dan pengumpulan skor.</p>
            
            <ul class="space-y-3 mb-8 text-left inline-block md:block">
                <li class="flex items-center gap-3 text-gray-300">
                    <span class="text-rginc-gold font-bold">✔</span> Wajib menggunakan mesin Pump It Up Phoenix 2 resmi (Bukan Mod).
                </li>
                <li class="flex items-center gap-3 text-gray-300">
                    <span class="text-rginc-gold font-bold">✔</span> Setiap peserta hanya diperbolehkan mendaftar di 1 Kategori.
                </li>
                <li class="flex items-center gap-3 text-gray-300">
                    <span class="text-rginc-gold font-bold">✔</span> Rekaman video skor wajib utuh (One Take), jelas, dan tanpa editan.
                </li>
            </ul>

            <div>
                <a href="{{ route('rules') }}" class="inline-flex items-center gap-2 bg-rginc-gold/10 border border-rginc-gold/40 text-rginc-gold px-6 py-3 rounded-lg font-bold hover:bg-rginc-gold hover:text-rginc-navy transition-all shadow-md">
                    <span>Baca Selengkapnya Rules & FAQ</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ================= PRIZE POOL SECTION ================= -->
<div id="prizepool" class="relative bg-[#0d1527] border-y border-rginc-gold/30 py-24 overflow-hidden">
    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-[800px] h-[800px] bg-yellow-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center mb-16">
            <div class="inline-block mb-6 relative">
                <div class="absolute inset-0 bg-yellow-500 blur-xl opacity-30 rounded-full"></div>
                <svg class="w-24 h-24 text-rginc-gold drop-shadow-2xl relative z-10" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.006 3.705a1.5 1.5 0 0 0-1.512 1.498l-.079 6.223c-.042 3.321-2.766 6.046-6.087 6.087l-6.224.079a1.5 1.5 0 0 0-1.498 1.512 1.5 1.5 0 0 0 1.512 1.498l6.223-.079c4.981-.063 9.07-4.152 9.133-9.133l.079-6.224a1.5 1.5 0 0 0-1.498-1.512z" opacity="0.3"/>
                    <path d="M17.5 2h-11C5.12 2 4 3.12 4 4.5v1.652c0 1.94 1.189 3.666 2.996 4.364L9 11.272v2.228h-2v2h2v3h-2v2h10v-2h-2v-3h2v-2h-2v-2.228l2.004-.756A4.686 4.686 0 0 0 20 6.152V4.5C20 3.12 18.88 2 17.5 2zM6 6.152V4.5c0-.276.224-.5.5-.5h1.5v4.354a2.695 2.695 0 0 1-2-2.202zm12 0a2.695 2.695 0 0 1-2 2.202V4h1.5c.276 0 .5.224.5.5v1.652z"/>
                </svg>
            </div>
            
            <h2 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 via-rginc-gold to-yellow-600 uppercase tracking-widest">
                PRIZE POOL
            </h2>
            <div class="w-24 h-1 bg-rginc-gold mx-auto mt-4 rounded"></div>
            <p class="mt-4 text-gray-300 text-lg">Be the Mighty One and get the prize!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- TEAMWORK PRIZES -->
            <div class="bg-slate-800/60 border-2 border-rginc-gold/30 rounded-2xl p-8 shadow-[0_0_30px_rgba(212,175,55,0.15)] hover:border-rginc-gold transition duration-300">
                <div class="flex items-center gap-3 mb-8 border-b border-slate-700 pb-4">
                    <svg class="w-8 h-8 text-rginc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <h3 class="text-3xl font-bold text-white tracking-widest uppercase">TEAMWORK</h3>
                </div>
                
                <div class="space-y-8">
                    <!-- Juara 1 Teamwork -->
                    <div class="flex items-start gap-5">
                        <div class="w-14 h-14 flex-shrink-0 bg-gradient-to-br from-yellow-300 to-yellow-600 rounded-full flex items-center justify-center font-black text-2xl text-slate-900 shadow-[0_0_15px_rgba(234,179,8,0.3)]">1</div>
                        <div>
                            <h4 class="font-bold text-yellow-500 text-xl mb-2">Juara 1</h4>
                            <div class="space-y-1">
                                <p class="text-white font-bold text-lg flex items-center gap-2">
                                    Rp 500.000 
                                    <span class="text-[10px] font-normal text-rginc-gold border border-rginc-gold/50 px-2 py-0.5 rounded-sm tracking-wider">E-MONEY</span>
                                </p>
                                <p class="text-sm text-gray-300 flex items-center gap-2">
                                    <span class="text-green-400">✔</span> E-Sertifikat
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Juara 2 Teamwork -->
                    <div class="flex items-start gap-5">
                        <div class="w-14 h-14 flex-shrink-0 bg-gradient-to-br from-gray-300 to-gray-500 rounded-full flex items-center justify-center font-black text-2xl text-slate-900 shadow-[0_0_15px_rgba(209,213,219,0.2)]">2</div>
                        <div>
                            <h4 class="font-bold text-gray-300 text-xl mb-2">Juara 2</h4>
                            <div class="space-y-1">
                                <p class="text-white font-bold text-lg flex items-center gap-2">
                                    Rp 400.000 
                                    <span class="text-[10px] font-normal text-rginc-gold border border-rginc-gold/50 px-2 py-0.5 rounded-sm tracking-wider">E-MONEY</span>
                                </p>
                                <p class="text-sm text-gray-300 flex items-center gap-2">
                                    <span class="text-green-400">✔</span> E-Sertifikat
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- INDIVIDU PRIZES -->
            <div class="bg-slate-800/60 border border-slate-600 rounded-2xl p-8 shadow-xl hover:border-rginc-gold/50 transition duration-300">
                <div class="flex items-center gap-3 mb-8 border-b border-slate-700 pb-4">
                    <svg class="w-8 h-8 text-rginc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <h3 class="text-3xl font-bold text-white tracking-widest uppercase">INDIVIDU</h3>
                </div>

                <div class="space-y-4">
                    <!-- Speed Male Senior -->
                    <div class="flex justify-between items-center bg-slate-900 p-4 rounded-lg border border-slate-700">
                        <div>
                            <h4 class="font-bold text-rginc-gold">1st Speed Male Senior</h4>
                            <p class="text-xs text-gray-400 mt-1 flex items-center gap-1"><span class="text-green-400 text-[10px]">✔</span> E-Sertifikat</p>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-white text-lg block">Rp 100.000</span>
                            <span class="text-[10px] font-normal text-rginc-gold border border-rginc-gold/50 px-2 py-0.5 rounded-sm tracking-wider inline-block mt-1">E-MONEY</span>
                        </div>
                    </div>
                    
                    <!-- Speed Female -->
                    <div class="flex justify-between items-center bg-slate-900 p-4 rounded-lg border border-slate-700">
                        <div>
                            <h4 class="font-bold text-rginc-gold">1st Speed Female</h4>
                            <p class="text-xs text-gray-400 mt-1 flex items-center gap-1"><span class="text-green-400 text-[10px]">✔</span> E-Sertifikat</p>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-white text-lg block">Rp 100.000</span>
                            <span class="text-[10px] font-normal text-rginc-gold border border-rginc-gold/50 px-2 py-0.5 rounded-sm tracking-wider inline-block mt-1">E-MONEY</span>
                        </div>
                    </div>

                    <!-- Speed Male Junior -->
                    <div class="flex justify-between items-center bg-slate-900 p-4 rounded-lg border border-slate-700">
                        <div>
                            <h4 class="font-bold text-rginc-gold">1st Speed Male Junior</h4>
                            <p class="text-xs text-gray-400 mt-1 flex items-center gap-1"><span class="text-green-400 text-[10px]">✔</span> E-Sertifikat</p>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-white text-lg block">Rp 75.000</span>
                            <span class="text-[10px] font-normal text-rginc-gold border border-rginc-gold/50 px-2 py-0.5 rounded-sm tracking-wider inline-block mt-1">E-MONEY</span>
                        </div>
                    </div>

                    <!-- Advance -->
                    <div class="flex justify-between items-center bg-slate-900 p-4 rounded-lg border border-slate-700">
                        <div>
                            <h4 class="font-bold text-rginc-gold">1st Advance Terbaik</h4>
                            <p class="text-xs text-gray-400 mt-1 flex items-center gap-1"><span class="text-green-400 text-[10px]">✔</span> E-Sertifikat</p>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-white text-lg block">Rp 75.000</span>
                            <span class="text-[10px] font-normal text-rginc-gold border border-rginc-gold/50 px-2 py-0.5 rounded-sm tracking-wider inline-block mt-1">E-MONEY</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= CTA GRATIS / PENDAFTARAN ================= -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 relative z-10">
    <div class="bg-slate-900/80 border-2 border-rginc-gold/30 hover:border-rginc-gold/60 rounded-3xl p-8 md:p-14 text-center relative overflow-hidden shadow-[0_0_30px_rgba(212,175,55,0.1)] hover:shadow-[0_0_40px_rgba(212,175,55,0.2)] transition-all duration-500 backdrop-blur-md group">
        
        <!-- Efek Cahaya Latar Belakang -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-20 group-hover:opacity-30 transition-opacity duration-500">
            <div class="w-[500px] h-[500px] bg-rginc-gold rounded-full blur-[120px]"></div>
        </div>

        <div class="relative z-10">
            <!-- Badge Gratis -->
            <div class="inline-flex items-center gap-2 bg-green-500/10 border border-green-500/30 text-green-400 font-bold text-xs md:text-sm px-5 py-2 rounded-full uppercase tracking-widest mb-8 shadow-sm">
                <span class="animate-bounce">🎉</span> 100% Gratis Tanpa Dipungut Biaya!
            </div>

            <!-- Judul Utama -->
            <h2 class="text-3xl md:text-5xl font-black text-white uppercase tracking-wider mb-6 leading-tight">
                Siap Menjadi Yang Terkuat di <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-rginc-gold to-yellow-600">MIGHTY ONE!</span>?
            </h2>

            <!-- Deskripsi Singkat -->
            <p class="text-gray-300 text-base md:text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
                Tunjukkan skill Pump It Up terbaikmu di hadapan komunitas nasional. Amankan slot kompetisimu sekarang, buktikan kemampuanmu, dan rebut total hadiah <strong class="text-rginc-gold">ratusan ribu rupiah</strong> serta gelar kebanggaan sang juara!
            </p>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                <a href="{{ route('register') }}" class="w-full sm:w-auto bg-gradient-to-r from-rginc-gold to-yellow-500 text-rginc-navy font-black px-8 py-4 rounded-xl text-base uppercase tracking-wider hover:from-yellow-400 hover:to-yellow-300 transition-all transform hover:-translate-y-1 shadow-[0_10px_20px_rgba(212,175,55,0.3)] flex items-center justify-center gap-2">
                    <span>Daftar Sekarang</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="{{ route('rules') }}" class="w-full sm:w-auto bg-slate-800/50 border border-slate-600 text-white font-bold px-8 py-4 rounded-xl text-base hover:bg-slate-800 hover:border-rginc-gold transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span>Baca Peraturan</span>
                </a>
            </div>

            <!-- Catatan Kecil di Bawah -->
            <p class="text-xs text-gray-500 mt-8 tracking-wide font-medium">
                *Pastikan data AM.Pass ID dan kategori lomba sudah sesuai sebelum mendaftar.
            </p>
        </div>
    </div>
</div>

<style>
    @keyframes shimmer {
        100% {
            transform: translateX(300%);
        }
    }
</style>

<!-- Script Animasi Confetti (Endless) -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const prizeSection = document.getElementById('prizepool');
        let confettiFired = false;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !confettiFired) {
                    confettiFired = true; // Agar tidak men-trigger setInterval berkali-kali saat scroll naik/turun
                    
                    const defaults = { startVelocity: 25, spread: 360, ticks: 60, zIndex: 50 };

                    function randomInRange(min, max) {
                        return Math.random() * (max - min) + min;
                    }

                    // Interval tanpa henti (tidak ada kondisi clearInterval)
                    setInterval(function() {
                        const particleCount = 20;
                        
                        // Ledakan kiri
                        confetti(Object.assign({}, defaults, { particleCount,
                            origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 }
                        }));
                        
                        // Ledakan kanan
                        confetti(Object.assign({}, defaults, { particleCount,
                            origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 }
                        }));
                    }, 400); // Meledak setiap 400ms
                }
            });
        }, { threshold: 0.4 }); 

        if (prizeSection) {
            observer.observe(prizeSection);
        }
    });
</script>
@endsection