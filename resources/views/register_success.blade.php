@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
    
    <!-- ================= BAGIAN 1: STATUS SUKSES ================= -->
    <div class="bg-slate-800/50 border border-green-500/30 rounded-2xl p-8 md:p-10 shadow-2xl backdrop-blur-sm mb-12">
        <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6 text-green-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        
        <h2 class="text-3xl font-bold text-rginc-gold mb-4">Pendaftaran Berhasil!</h2>
        <p class="text-gray-300 mb-6">{{ session('success', 'Data Anda telah kami terima.') }}</p>

        @if(session('participantCode'))
            <div class="bg-slate-900 border border-rginc-gold/20 p-6 rounded-lg mb-4 inline-block">
                <p class="text-sm text-gray-400 mb-2">Kode Peserta Anda:</p>
                <p class="text-3xl font-mono font-bold text-white tracking-widest">{{ session('participantCode') }}</p>
                <p class="text-xs text-yellow-500 mt-2">*Simpan kode ini untuk input skor saat babak penyisihan</p>
            </div>
        @endif
    </div>

    <!-- ================= BAGIAN 2: SHARE TIKET (RASIO 9:16) ================= -->
    <div class="bg-slate-800/30 border border-slate-700 rounded-2xl p-6 md:p-10 text-center mb-12">
        <h3 class="text-2xl font-bold text-white mb-2">Tantang Temanmu!</h3>
        <p class="text-gray-400 text-sm mb-8">Bagikan tiket ini ke IG Story atau WhatsApp Status.</p>

        <!-- Wrapper Preview Flyer -->
        <div class="flex justify-center mb-8">
            
            <!-- FLYER ELEMENT (Proporsi 9:16 -> w-[300px] h-[533px]) -->
            <div id="flyer-preview" class="relative w-[300px] h-[533px] rounded-xl overflow-hidden flex flex-col items-center p-6" style="background-color: #0f172a; border: 2px solid #d4af37; box-sizing: border-box;">
                
                <!-- Background Layer -->
                <div class="absolute inset-0 z-0" style="background: radial-gradient(circle at center, #1e293b 0%, #0f172a 85%);"></div>

                <!-- 1. HEADER: Logo Area -->
                <div class="relative z-10 w-full flex justify-between items-start mb-8 mt-2">
                    <img src="{{ asset('logo/M81_logo.png') }}" alt="M81" style="height: 32px; object-fit: contain;" crossorigin="anonymous">
                    <img src="{{ asset('logo/phoenix2.png') }}" alt="Phoenix 2" style="height: 30px; object-fit: contain;" crossorigin="anonymous">
                </div>

                <!-- 2. BODY: Konten Teks -->
                <div class="relative z-10 w-full text-center flex-grow flex flex-col justify-center items-center">
                    <p style="color: #d4af37; font-size: 11px; font-weight: bold; letter-spacing: 4px; text-transform: uppercase; margin-bottom: 12px;">
                        Mighty One 2026
                    </p>
                    
                    <h4 style="color: #ffffff; font-size: 46px; font-weight: 900; line-height: 1; text-transform: uppercase; font-style: italic; margin-bottom: 24px; text-shadow: 2px 4px 6px rgba(0,0,0,0.8);">
                        I AM <br> READY!
                    </h4>
                    
                    <!-- Container Teks Random -->
                    <div style="background-color: #d4af37; border-radius: 4px; padding: 8px 16px; box-shadow: 0 4px 6px rgba(0,0,0,0.4);">
                        <span id="random-quote" style="color: #0f172a; font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 1.5px;">
                            SIAP MENGHADAPI TANTANGAN!
                        </span>
                    </div>
                </div>

                <!-- 3. FOOTER: QR Code -->
                <div class="relative z-10 flex flex-col items-center mt-auto mb-2">
                    <p style="color: #9ca3af; font-size: 10px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 12px;">
                        Scan & Join The Battle
                    </p>
                    
                    <div style="background-color: #ffffff; padding: 8px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.6);">
                        <img src="{{ asset('images/qr-rginc.png') }}" 
                             alt="QR Code Pendaftaran Mighty One" 
                             style="width: 84px; height: 84px;"
                             crossorigin="anonymous">
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Share -->
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <button type="button" onclick="shareFlyer('ig', event)" class="flex items-center justify-center gap-2 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-bold py-3 px-6 rounded-xl transition-transform transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                Share ke IG Story
            </button>

            <button type="button" onclick="shareFlyer('wa', event)" class="flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-xl transition-transform transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964 1.003-3.585c-.605-1.037-.922-2.242-.922-3.486 0-3.844 3.129-6.974 6.974-6.974 3.847 0 6.977 3.13 6.977 6.974 0 3.846-3.13 6.974-6.977 6.974z"/></svg>
                Bagikan ke WA Status
            </button>
        </div>
    </div>

    <!-- ================= BAGIAN 3: TOMBOL KEMBALI ================= -->
    <div>
        <a href="{{ url('/') }}" class="inline-block bg-rginc-navy border border-rginc-gold text-rginc-gold px-8 py-3 rounded-xl font-bold hover:bg-rginc-gold/10 transition shadow-lg">
            Kembali ke Beranda
        </a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
async function shareFlyer(platform, event) {
    const flyerElement = document.getElementById('flyer-preview');
    const currentBtn = event.currentTarget;
    const originalText = currentBtn.innerHTML;
    
    currentBtn.innerHTML = '<span class="animate-pulse">Memproses...</span>';
    currentBtn.disabled = true; 
    
    const quotes = [
        "BUKTIKAN LANGKAH TERBAIKMU!",
        "TANTANG BATAS MAKSIMALMU!",
        "REBUT GELAR SANG JUARA!",
        "NO EXCUSES, JUST PUMP IT!",
        "SHOW YOUR BEST MOVES!",
        "KALAHKAN KERAGUANMU!",
        "SAATNYA MENDOMINASI STAGE!",
        "SIAP MENJADI YANG TERKUAT!"
    ];
    
    document.getElementById('random-quote').innerText = quotes[Math.floor(Math.random() * quotes.length)];

    try {
        const canvas = await html2canvas(flyerElement, { 
            scale: 2, 
            useCORS: true, 
            backgroundColor: '#0f172a' 
        });

        canvas.toBlob(async (blob) => {
            const file = new File([blob], 'mighty-one-tiket.png', { type: 'image/png' });
            
            const shareData = {
                title: 'Mighty One - RGInc',
                text: 'Saya siap menantangmu di kompetisi Mighty One! Daftar sekarang via link di QR Code atau link https://rginc.online/ 🔥',
                files: [file]
            };

            if (navigator.canShare && navigator.canShare({ files: [file] })) {
                try {
                    await navigator.share(shareData);
                } catch (error) {
                    console.log('Proses share dibatalkan.');
                }
            } else {
                const link = document.createElement('a');
                link.download = 'MightyOne-RGInc.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
                
                alert('Gambar berhasil diunduh! Silakan upload manual ke ' + (platform === 'ig' ? 'IG Story' : 'WA Status') + ' Anda.');
            }
            
            currentBtn.innerHTML = originalText;
            currentBtn.disabled = false;
        }, 'image/png');

    } catch (error) {
        console.error('Gagal membuat flyer:', error);
        alert('Maaf, terjadi kesalahan saat memproses gambar.');
        
        currentBtn.innerHTML = originalText;
        currentBtn.disabled = false;
    }
}
</script>
@endsection