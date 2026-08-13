<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary Meta Tags -->
    <title>RGinc MIGHTY ONE! - HUT RI 81</title>
    <meta name="title" content="RGinc MIGHTY ONE! - HUT RI 81 Pump It Up Online Competition 2026">
    <meta name="description" content="Tunjukkan stamina dan refleks terbaikmu di ajang bergengsi perayaan Anniversary RGinc & Semarak Kemerdekaan RI ke-81! Total hadiah jutaan rupiah menanti.">

    <!-- Open Graph / Facebook / WhatsApp / Telegram -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="RGinc MIGHTY ONE! - HUT RI 81 Pump It Up Online Competition 2026">
    <meta property="og:description" content="Tunjukkan stamina dan refleks terbaikmu di ajang bergengsi perayaan Anniversary RGinc & Semarak Kemerdekaan RI ke-81! Total hadiah jutaan rupiah menanti.">
    <!-- Ganti 'logo/M81_logo.png' dengan gambar banner / poster event yang lebar (rekomendasi 1200x630px jika ada) -->
    <meta property="og:image" content="{{ asset('logo/M81_logo.png') }}">

    <!-- Twitter Card -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="RGinc MIGHTY ONE! - HUT RI 81 Pump It Up Online Competition 2026">
    <meta property="twitter:description" content="Tunjukkan stamina dan refleks terbaikmu di ajang bergengsi perayaan Anniversary RGinc & Semarak Kemerdekaan RI ke-81! Total hadiah jutaan rupiah menanti.">
    <meta property="twitter:image" content="{{ asset('logo/M81_logo.png') }}">

    <!-- Favicon & Touch Icons -->
    <link rel="icon" type="image/png" href="{{ asset('logo/rginc.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo/rginc.png') }}">

    <!-- Vite Assets & Alpine.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-rginc-navy text-white min-h-screen font-sans antialiased selection:bg-rginc-gold selection:text-rginc-navy flex flex-col">
    <div id="page-preloader" class="fixed inset-0 z-[99999] bg-rginc-navy flex flex-col items-center justify-center transition-opacity duration-500">
        <div class="relative flex flex-col items-center">
            <!-- Lingkaran Cahaya Emas Berdenyut di Belakang Logo -->
            <div class="absolute w-24 h-24 bg-rginc-gold/20 rounded-full blur-xl animate-pulse"></div>
            
            <!-- Logo RGinc dengan Animasi Membesar-Mengecil -->
            <img src="{{ asset('logo/rginc.png') }}" alt="RGinc Loading" class="h-16 md:h-20 w-auto animate-bounce relative z-10 drop-shadow-[0_0_15px_rgba(212,175,55,0.5)]">
            
            <!-- Teks Loading -->
            <span class="mt-6 text-rginc-gold font-bold tracking-widest text-sm uppercase animate-pulse">
                Loading RGINC...
            </span>
        </div>
    </div>
    <nav x-data="{ open: false }" class="border-b border-rginc-gold/20 bg-rginc-navy/95 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('logo/rginc.png') }}" alt="RGinc Logo" class="h-10 md:h-12 w-auto">
                    <div>
                        <span class="text-rginc-gold font-bold text-lg md:text-xl tracking-wider block">RGINC</span>
                        <span class="text-xs md:text-sm block text-gray-400">PIU Online Competition</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ url('/') }}" 
                    class="transition {{ request()->is('/') ? 'text-rginc-gold font-bold border-b-2 border-rginc-gold pb-1' : 'text-gray-300 hover:text-rginc-gold' }}">
                    Beranda
                    </a>

                    <a href="{{ route('rules') }}" 
                    class="transition {{ request()->routeIs('rules') ? 'text-rginc-gold font-bold border-b-2 border-rginc-gold pb-1' : 'text-gray-300 hover:text-rginc-gold' }}">
                    Aturan & FAQ
                    </a>
                    
                    <a href="{{ route('score.login') }}" 
                    class="transition {{ request()->routeIs('score.*') ? 'text-rginc-gold font-bold border-b-2 border-rginc-gold pb-1' : 'text-gray-300 hover:text-rginc-gold' }}">
                    Input Skor
                    </a>
                    
                    <a href="{{ route('leaderboard.index') }}" 
                    class="transition {{ request()->routeIs('leaderboard.*') ? 'text-rginc-gold font-bold border-b-2 border-rginc-gold pb-1' : 'text-gray-300 hover:text-rginc-gold' }}">
                    Leaderboard
                    </a>

                    <a href="{{ route('timeline') }}" 
                    class="transition {{ request()->routeIs('timeline') ? 'text-rginc-gold font-bold border-b-2 border-rginc-gold pb-1' : 'text-gray-300 hover:text-rginc-gold' }}">
                    Timeline
                    </a>
                    
                    <a href="{{ route('register') }}" 
                    class="px-5 py-2 rounded font-semibold transition shadow-lg shadow-rginc-gold/20 {{ request()->routeIs('register*') ? 'bg-yellow-500 text-rginc-navy' : 'bg-rginc-gold text-rginc-navy hover:bg-yellow-500' }}">
                    Daftar
                    </a>
                </div>

                <!-- Hamburger Button (Mobile) -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-rginc-gold focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <!-- Ikon Hamburger -->
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <!-- Ikon Close (X) -->
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="open" @click.away="open = false" class="md:hidden border-t border-rginc-gold/20 bg-slate-900/95 backdrop-blur absolute w-full" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ url('/') }}" 
                class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'bg-slate-800 text-rginc-gold border-l-4 border-rginc-gold' : 'text-gray-300 hover:text-rginc-gold hover:bg-slate-800' }}">
                Beranda
                </a>
                
                <a href="{{ route('rules') }}" 
                class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('rules') ? 'bg-slate-800 text-rginc-gold border-l-4 border-rginc-gold' : 'text-gray-300 hover:text-rginc-gold hover:bg-slate-800' }}">
                Aturan & FAQ
                </a>

                <a href="{{ route('score.login') }}" 
                class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('score.*') ? 'bg-slate-800 text-rginc-gold border-l-4 border-rginc-gold' : 'text-gray-300 hover:text-rginc-gold hover:bg-slate-800' }}">
                Input Skor
                </a>
                
                <a href="{{ route('leaderboard.index') }}" 
                class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('leaderboard.*') ? 'bg-slate-800 text-rginc-gold border-l-4 border-rginc-gold' : 'text-gray-300 hover:text-rginc-gold hover:bg-slate-800' }}">
                Leaderboard
                </a>
                
                <a href="{{ route('timeline') }}" 
                class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('timeline') ? 'bg-slate-800 text-rginc-gold border-l-4 border-rginc-gold' : 'text-gray-300 hover:text-rginc-gold hover:bg-slate-800' }}">
                Timeline
                </a>

                <a href="{{ route('register') }}" 
                class="block px-3 py-2 mt-4 text-center rounded-md text-base font-bold shadow-lg {{ request()->routeIs('register*') ? 'bg-yellow-500 text-rginc-navy' : 'bg-rginc-gold text-rginc-navy' }}">
                Daftar Sekarang
                </a>
            </div>
        </div>
    </nav>

    <!-- Content (Flex grow agar footer ke bawah) -->
    <main class="flex-grow">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" class="max-w-7xl mx-auto px-4 mt-6">
                <div class="bg-green-500/20 border border-green-500/50 text-green-400 p-4 rounded-xl flex justify-between items-center shadow-lg shadow-green-500/10">
                    <span class="font-bold">{{ session('success') }}</span>
                    <button @click="show = false" class="text-green-400 hover:text-white transition">✖</button>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-rginc-gold/20 bg-[#0a101d] py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            
            <!-- Kiri: Copyright -->
            <div class="text-sm text-gray-500 text-center md:text-left">
                <p>&copy; {{ date('Y') }} RGinc Anniversary & HUT RI ke-81.</p>
                <p class="mt-1">All rights reserved.</p>
                <p class="mt-2 text-xs">
                    Made with <span class="text-red-500">&hearts;</span> by <a href="https://muhilman.com" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-rginc-gold transition-colors duration-300">Hilman</a>
                </p>
            </div>
            
            <!-- Kanan: Social Media Icons -->
            <div class="flex items-center space-x-6">
                <!-- Instagram -->
                <a href="https://www.instagram.com/rginc.official/" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-rginc-gold transition-colors duration-300" title="Follow Instagram RGinc">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                </a>

                <!-- TikTok -->
                <a href="https://www.tiktok.com/@rginc.official" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-rginc-gold transition-colors duration-300" title="Follow TikTok RGinc">
                    <span class="sr-only">TikTok</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512" aria-hidden="true">
                        <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                    </svg>
                </a>
            </div>

        </div>
    </footer>

    <script>
        // Sembunyikan preloader saat halaman selesai dimuat pertama kali
        window.addEventListener('load', function () {
            const preloader = document.getElementById('page-preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }
        });

        // Munculkan kembali preloader saat pengguna mengklik link navigasi internal
        document.addEventListener('click', function (e) {
            const link = e.target.closest('a');
            if (link && link.href && link.hostname === window.location.hostname && !link.getAttribute('target') && !link.getAttribute('href').startsWith('#')) {
                const preloader = document.getElementById('page-preloader');
                if (preloader) {
                    preloader.style.display = 'flex';
                    preloader.style.opacity = '1';
                }
            }
        });
    </script>
    <script>
        function confirmAction(event, title, text, confirmText, colorHex) {
            event.preventDefault(); // Hentikan submit form bawaan
            const form = event.target.closest('form');

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: colorHex,
                cancelButtonColor: '#64748b', // warna slate-500
                confirmButtonText: confirmText,
                cancelButtonText: 'Batal',
                background: '#1e293b', // warna slate-800 (Tema Gelap)
                color: '#f8fafc', // warna slate-50
                customClass: {
                    popup: 'border border-slate-700 rounded-2xl'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Lanjutkan submit jika user klik "Ya"
                }
            });
        }
    </script>
</body>
</html>