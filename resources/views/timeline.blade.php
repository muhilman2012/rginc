@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 uppercase tracking-widest">TIMELINE EVENT</h1>
        <p class="text-gray-400">Jadwal lengkap rangkaian kompetisi RGinc PIU Scoring HUT RI 81.</p>
        <div class="w-24 h-1 bg-rginc-gold mx-auto mt-6 rounded"></div>
    </div>

    <!-- Container Timeline Vertikal -->
    <div class="relative border-l-2 border-rginc-gold/30 ml-3 md:ml-6 space-y-8 pb-10">
        
        @php
            $timelines = [
                ['date' => '13-16 Agustus', 'time' => '23:59', 'title' => 'Pendaftaran', 'platform' => 'Link web'],
                ['date' => '17-23 Agustus', 'time' => '23:00', 'title' => 'Pengumpulan skor Penyisihan', 'platform' => 'Link web'],
                ['date' => '23-24 Agustus', 'time' => '17:00', 'title' => 'Verifikasi skor, penentuan tim, & pengumuman lagu babak Semi Final', 'platform' => 'Instagram'],
                ['date' => '25-30 Agustus', 'time' => '23:00', 'title' => 'Pengumpulan skor Semi Final', 'platform' => 'Link web'],
                ['date' => '30-31 Agustus', 'time' => '17:00', 'title' => 'Verifikasi skor, penentuan tim, & pengumuman lagu babak Final 1', 'platform' => 'Instagram'],
                ['date' => '1-6 September', 'time' => '23:00', 'title' => 'Pengumpulan skor Final 1', 'platform' => 'Link web'],
                ['date' => '6-7 September', 'time' => '17:00', 'title' => 'Verifikasi skor, penentuan tim, & pengumuman lagu babak Final 2', 'platform' => 'Instagram'],
                ['date' => '7-13 September', 'time' => '23:00', 'title' => 'Pengumpulan skor Final 2', 'platform' => 'Link web'],
                ['date' => '13-14 September', 'time' => '17:00', 'title' => 'Verifikasi skor, penentuan tim, & pengumuman lagu babak Final 3', 'platform' => 'Instagram'],
                ['date' => '14-20 September', 'time' => '23:00', 'title' => 'Pengumpulan skor Final 3', 'platform' => 'Link web'],
                ['date' => '20-22 September', 'time' => '17:00', 'title' => 'Verifikasi skor', 'platform' => 'Link web'],
                ['date' => '23 September', 'time' => '17:00', 'title' => 'Pengumuman pemenang', 'platform' => 'Instagram'],
                ['date' => '23-30 September', 'time' => '23:59', 'title' => 'Masa pengiriman hadiah', 'platform' => '-'],
            ];
        @endphp

        @foreach($timelines as $index => $item)
            <!-- Item Timeline -->
            <div class="relative pl-8 md:pl-12 group">
                <!-- Titik (Dot) pada Garis -->
                <div class="absolute -left-[9px] top-1/2 transform -translate-y-1/2 w-4 h-4 rounded-full bg-slate-900 border-2 border-rginc-gold shadow-[0_0_10px_rgba(212,175,55,0)] group-hover:bg-rginc-gold group-hover:shadow-[0_0_15px_rgba(212,175,55,0.8)] transition-all duration-300 z-10"></div>
                
                <!-- Card Konten -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-5 md:p-6 hover:border-rginc-gold/50 transition-all duration-300 shadow-lg hover:shadow-[0_0_20px_rgba(212,175,55,0.15)] relative overflow-hidden">
                    
                    <!-- Efek kilap kecil di ujung card -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-rginc-gold/5 rounded-bl-full"></div>

                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                        <!-- Info Kegiatan -->
                        <div class="w-full md:w-2/3">
                            <span class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1 block">Tahap {{ $index + 1 }}</span>
                            <h3 class="text-lg md:text-xl font-bold text-white leading-tight">{{ $item['title'] }}</h3>
                            
                            @if($item['platform'] !== '-')
                                <div class="mt-3 inline-flex items-center gap-2 bg-slate-900 border border-slate-700 px-3 py-1.5 rounded-md">
                                    @if(strtolower($item['platform']) == 'instagram')
                                        <svg class="w-4 h-4 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                                    @else
                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                    @endif
                                    <span class="text-xs text-gray-300 font-semibold uppercase">{{ $item['platform'] }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Info Tanggal & Waktu -->
                        <div class="w-full md:w-1/3 text-left md:text-right border-t md:border-t-0 border-slate-700 pt-3 md:pt-0">
                            <span class="inline-block text-rginc-gold font-bold text-lg whitespace-nowrap">{{ $item['date'] }}</span>
                            <div class="flex items-center md:justify-end gap-1 text-red-400 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-sm font-mono font-semibold">{{ $item['time'] }} WIB</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection