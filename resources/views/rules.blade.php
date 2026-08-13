@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">ATURAN & FAQ</h1>
        <p class="text-gray-400">Panduan lengkap kompetisi RGinc PIU Scoring HUT RI 81.</p>
    </div>

    <!-- ================= SECTION: PERATURAN UMUM ================= -->
    <div class="bg-slate-800/50 border border-rginc-gold/30 rounded-2xl p-6 md:p-10 mb-8 shadow-xl backdrop-blur-sm relative overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-rginc-gold"></div>
        <h2 class="text-2xl font-bold text-rginc-gold mb-6 flex items-center gap-2 border-b border-slate-700 pb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            1. Syarat & Ketentuan Umum
        </h2>
        
        <ul class="space-y-4 text-gray-300">
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">1.</span>
                <p>Lomba bersifat <strong>terbuka untuk umum</strong>, siapapun diperbolehkan untuk mendaftar dan mengikuti kompetisi ini.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">2.</span>
                <p>Kompetisi ini diselenggarakan secara <strong>ONLINE</strong>. Seluruh patokan waktu yang digunakan dalam kompetisi ini adalah <strong>Waktu Indonesia Barat (GMT +7)</strong>.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">3.</span>
                <p>Peserta wajib mendaftar pada kategori yang sesuai dengan batas kemampuan <strong>(skill)</strong> masing-masing. Jujurlah pada diri sendiri.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">4.</span>
                <p>Ini adalah permainan berbasis tim (untuk babak lanjutan). Pastikan setiap peserta <strong>bertanggung jawab menjaga keharmonisan tim</strong>.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">5.</span>
                <p>Jika ada peserta yang mengundurkan diri atau gagal mengunggah video pada babak Final, peserta tersebut <strong>tidak akan digantikan</strong> oleh orang lain dan otomatis mendapatkan nilai <strong>0 (Nol)</strong>.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">6.</span>
                <p>Keputusan dari pihak panitia penyelenggara bersifat <strong>MUTLAK</strong> dan tidak dapat diganggu gugat.</p>
            </li>
        </ul>
    </div>

    <!-- ================= SECTION: KETENTUAN MESIN & BERMAIN ================= -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6 md:p-10 mb-8 shadow-xl backdrop-blur-sm">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2 border-b border-slate-700 pb-4">
            <svg class="w-6 h-6 text-rginc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
            2. Ketentuan Mesin & Gaya Bermain
        </h2>
        
        <ul class="space-y-4 text-gray-300">
            <li class="flex items-start gap-3">
                <span class="text-rginc-gold mt-1">●</span>
                <p>Mesin dan lagu yang diakui dan digunakan dalam kompetisi ini wajib <strong>Pump It Up Phoenix 2</strong> versi resmi (bukan Mod).</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-rginc-gold mt-1">●</span>
                <p>Peserta diperbolehkan bermain dengan gaya <strong>memegang bar (Bar) maupun tanpa memegang bar (No Bar)</strong>. Tidak ada penambahan atau pengurangan skor untuk kedua gaya ini.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-rginc-gold mt-1">●</span>
                <p>Peserta dipersilakan bermain menggunakan alas kaki (sepatu) maupun tidak (nyeker). Namun, <strong>segala risiko cedera sepenuhnya ditanggung oleh peserta</strong>.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-rginc-gold mt-1">●</span>
                <p>Pengaturan (Modifiers) mesin yang <strong>diperbolehkan</strong> hanya: <span class="bg-slate-900 text-yellow-400 px-2 py-0.5 rounded text-sm font-mono border border-slate-700">SPEED</span>, <span class="bg-slate-900 text-yellow-400 px-2 py-0.5 rounded text-sm font-mono border border-slate-700">AV</span>, <span class="bg-slate-900 text-yellow-400 px-2 py-0.5 rounded text-sm font-mono border border-slate-700">BGA DARK</span>, <span class="bg-slate-900 text-yellow-400 px-2 py-0.5 rounded text-sm font-mono border border-slate-700">FD</span>, <span class="bg-slate-900 text-yellow-400 px-2 py-0.5 rounded text-sm font-mono border border-slate-700">NOTE SKIN</span>, <span class="bg-slate-900 text-yellow-400 px-2 py-0.5 rounded text-sm font-mono border border-slate-700">JT</span>, dan <span class="bg-slate-900 text-yellow-400 px-2 py-0.5 rounded text-sm font-mono border border-slate-700">NT</span>. Selain dari daftar ini <strong>dilarang keras</strong>.</p>
            </li>
        </ul>
    </div>

    <!-- ================= SECTION: PANDUAN PEREKAMAN VIDEO ================= -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6 md:p-10 mb-8 shadow-xl backdrop-blur-sm relative">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2 border-b border-slate-700 pb-4">
            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            3. Panduan Pengambilan Video (One Take)
        </h2>
        
        <div class="space-y-6 text-gray-300">
            <div class="bg-slate-900/50 p-4 rounded-lg border-l-4 border-red-500">
                <p class="font-bold text-white mb-1">WAJIB ONE TAKE VIDEO!</p>
                <p class="text-sm">Hasil rekaman yang dikirimkan wajib berupa 1 (satu) buah video utuh. <strong>TIDAK BOLEH ada JEDA/PAUSE dan TIDAK BOLEH DIEDIT</strong>. Jika terdapat indikasi kecurangan, potongan video, atau menggunakan format <strong>streaming overlay</strong>, panitia berhak mendiskualifikasi peserta secara sepihak.</p>
            </div>

            <ul class="space-y-4">
                <li class="flex items-start gap-3">
                    <span class="text-green-500 mt-1">✔</span>
                    <p><strong>Sebelum bermain:</strong> Video harus diawali dengan peserta menampilkan wajah ke kamera sambil mengucapkan <em>“RG Inc Mighty One”</em>. Kamera juga harus menyorot layar untuk menunjukkan Judul Lagu, Level, dan Mode yang akan dimainkan.</p>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-500 mt-1">✔</span>
                    <p><strong>Saat bermain:</strong> Sudut pandang kamera <strong>(angle)</strong> sangat dianjurkan berbentuk vertikal (berdiri). Pastikan layar mesin dan tubuh peserta (minimal setengah badan) terlihat jelas. Kamera tidak boleh terlalu dekat dan tidak boleh terlalu jauh.</p>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-500 mt-1">✔</span>
                    <p><strong>Setelah bermain:</strong> Dilarang memotong bagian akhir video (dari lagu selesai hingga layar skor muncul). Tunjukkan hasil skor dan <strong>grade</strong> dengan sangat jelas di akhir video.</p>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-500 mt-1">✔</span>
                    <p>Peserta diperbolehkan melakukan <strong>retake</strong> (perekaman ulang) berkali-kali untuk dirinya sendiri hingga mendapatkan hasil skor yang paling memuaskan sebelum diserahkan.</p>
                </li>
            </ul>
        </div>
    </div>

    <!-- ================= SECTION: PANDUAN UPLOAD & INPUT SKOR ================= -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6 md:p-10 mb-8 shadow-xl backdrop-blur-sm">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2 border-b border-slate-700 pb-4">
            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            4. Pengiriman Skor & Publikasi Sosmed
        </h2>
        
        <ul class="space-y-4 text-gray-300">
            <li class="flex items-start gap-3">
                <span class="text-blue-400 mt-1">●</span>
                <p>Peserta wajib mengunggah <strong>(upload)</strong> video permainan tersebut ke <strong>Instagram</strong> menggunakan akun yang <strong>SAMA</strong> dengan yang didaftarkan saat registrasi. Pastikan akun Instagram <strong>TIDAK DIPRIVASI</strong>.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-blue-400 mt-1">●</span>
                <p>Pada unggahan tersebut, wajib melakukan Tag/Mention ke akun <strong>@rginc.official</strong>.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-blue-400 mt-1">●</span>
                <p>Caption unggahan bebas dengan memperhatikan etika & norma kesopanan, namun <strong>WAJIB</strong> menyertakan kalimat: <em>“RG INC Mighty One”</em>.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-blue-400 mt-1">●</span>
                <p>Khusus pada babak Semi Final hingga Final, peserta <strong>wajib menggunakan fitur Schedule Post</strong> (Jadwalkan Postingan) pada waktu spesifik yang akan ditentukan oleh panitia.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-blue-400 mt-1">●</span>
                <p><strong>Input Skor:</strong> Selain mengunggah video ke Instagram, peserta juga <strong>wajib menginput angka skor</strong> melalui <strong>link website</strong> yang disediakan oleh panitia di setiap babaknya. Bukti skor harus <strong>di-capture/difoto (boleh screenshot dari video asli, asalkan tidak blur/buram)</strong> dan dilampirkan pada formulir input.</p>
            </li>
        </ul>
    </div>

    <!-- ================= SECTION: BEST SPEED COMPETITION (#BSC) ================= -->
    <div class="bg-slate-800/50 border border-rginc-gold/30 rounded-2xl p-6 md:p-10 mb-8 shadow-xl backdrop-blur-sm relative overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-rginc-gold"></div>
        <h2 class="text-2xl font-bold text-rginc-gold mb-6 flex items-center gap-2 border-b border-slate-700 pb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            5. Best Speed Competition (#BSC)
        </h2>
        
        <ul class="space-y-4 text-gray-300">
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">●</span>
                <p>Hanya peserta yang berhasil masuk ke babak penyisihan <strong>(8 peserta dari setiap kategori)</strong> yang berhak mengumpulkan skor individu untuk memenangkan kategori <strong>Best Speed Competition (#BSC)</strong>, baik yang timnya lolos maupun gugur di babak selanjutnya.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">●</span>
                <p>Pemilihan individu terbaik diambil berdasarkan <strong>akumulasi skor tertinggi</strong> yang diraih oleh masing-masing individu pada seluruh babak.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">●</span>
                <p>Rentang level untuk Speed Competition berjalan dan menyesuaikan secara dinamis sesuai dengan level lomba dari babak penyisihan hingga babak final.</p>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-yellow-500 font-bold mt-0.5">●</span>
                <p>Sistem perhitungan skor dalam #BSC menggunakan metode <strong>akumulasi total skor</strong> dari babak Penyisihan sampai dengan Final (Week 3) selesai.</p>
            </li>
        </ul>
    </div>

    <!-- Section: FAQ -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-2xl p-6 md:p-10 shadow-xl backdrop-blur-sm">
        <h2 class="text-2xl font-bold text-white mb-8 border-b border-slate-700 pb-4">Tanya Jawab (FAQ)</h2>
        
        <div class="space-y-6">
            
            <!-- Q1 -->
            <div class="bg-slate-900/50 p-5 rounded-lg border border-slate-700 hover:border-rginc-gold/50 transition">
                <h3 class="text-lg font-bold text-rginc-gold mb-2">Q: Kak, apakah boleh mengikuti 2 Kategori?</h3>
                <p class="text-gray-300"><strong>A:</strong> Tidak Boleh yah. Setiap peserta hanya diperbolehkan mengikuti 1 kategori saja agar kompetisi berjalan adil.</p>
            </div>

            <!-- Q2 -->
            <div class="bg-slate-900/50 p-5 rounded-lg border border-slate-700 hover:border-rginc-gold/50 transition">
                <h3 class="text-lg font-bold text-rginc-gold mb-2">Q: Apabila di GC (Game Center) tempat saya bermain mesin pump-nya bukan Versi Phoenix 2 bagaimana?</h3>
                <p class="text-gray-300"><strong>A:</strong> Tidak bisa ya. Perekaman skor wajib menggunakan mesin Phoenix 2 resmi, bukan versi modifikasi.</p>
            </div>

            <!-- Q3 -->
            <div class="bg-slate-900/50 p-5 rounded-lg border border-slate-700 hover:border-rginc-gold/50 transition">
                <h3 class="text-lg font-bold text-rginc-gold mb-2">Q: Skill saya sebenarnya nanggung kak. Ada beberapa level Speed Male yang saya kuasai, tapi saya kurang pede, bagaimana ya?</h3>
                <p class="text-gray-300"><strong>A:</strong> Lebih baik percaya diri dengan kemampuan diri sendiri! Seperti yang sudah dijelaskan di poin pendaftaran, jangan ragu untuk menantang batas kemampuanmu.</p>
            </div>

            <!-- Q4 -->
            <div class="bg-slate-900/50 p-5 rounded-lg border border-slate-700 hover:border-rginc-gold/50 transition">
                <h3 class="text-lg font-bold text-rginc-gold mb-2">Q: Untuk pengundian member tim di babak selanjutnya akan diumumkan di mana?</h3>
                <p class="text-gray-300"><strong>A:</strong> Kami akan mengumumkan seluruh detail pengundian dan pembagian tim melalui akun Instagram resmi kami. Pastikan kalian selalu pantau ya!</p>
            </div>

            <!-- Q5 -->
            <div class="bg-slate-900/50 p-5 rounded-lg border border-slate-700 hover:border-rginc-gold/50 transition">
                <h3 class="text-lg font-bold text-rginc-gold mb-2">Q: Kak, bagaimana jika tidak ada yang bisa merekam saya karena lagi main sendiri?</h3>
                <p class="text-gray-300"><strong>A:</strong> Boleh memakai tripod jika aman untuk merekam sendiri. Kalau tidak memungkinkan, kamu bisa merekam bergaya <em>video selfie</em>. Yang terpenting, <strong>hasil skor harus berada dalam 1 video yang sama, tidak boleh terputus/diedit, dan harus terlihat jelas</strong>.</p>
            </div>

        </div>
    </div>

    <div class="mt-10 text-center">
        <a href="{{ route('register') }}" class="inline-block bg-rginc-gold text-rginc-navy font-bold px-8 py-3 rounded hover:bg-yellow-500 transition shadow-lg shadow-rginc-gold/20">
            Paham! Saya Ingin Daftar
        </a>
    </div>

</div>
@endsection