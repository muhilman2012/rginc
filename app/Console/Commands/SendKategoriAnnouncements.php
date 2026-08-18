<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Participant;
use App\Mail\AnnouncementMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendKategoriAnnouncements extends Command
{
    /**
     * Nama dan deskripsi command.
     */
    protected $signature = 'rginc:send-kategori-announcements';
    protected $description = 'Mengirimkan email pengumuman lagu kepada peserta berdasarkan kategori mereka.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai proses pengiriman email pengumuman kategori massal...');

        // 1. Definisikan Data Lagu dari Gambar (Berdasarkan Kategori Asli di DB)
        // Sesuaikan key array ini (seperti 'Advance', 'Speed Female') agar SAMA PERSIS 
        // dengan nama kategori yang ada di database Anda.
        $songDataMap = [
            'Advance' => [
                'category' => 'Advance',
                'title'    => 'Turkey Virus',
                'artist'   => 'Banya Production', 
                'bpm'      => 'BPM 150-162',     
                'level'    => 'S15',
                'image'    => 'turkey_virus.jpeg'
            ],
            'Speed Female' => [
                'category' => 'Speed Female',
                'title'    => 'WI-EX-DOC-VA',
                'artist'   => 'YAHPP',
                'bpm'      => 'BPM 195',
                'level'    => 'S17',
                'image'    => 'wi_ex_doc_va.jpeg'
            ],
            'Speed Male Junior' => [
                'category' => 'Speed Male Junior',
                'title'    => 'Bemera',
                'artist'   => 'YAHPP',
                'bpm'      => 'BPM 210',
                'level'    => 'S18',
                'image'    => 'bemera.jpeg'
            ],
            'Speed Male Senior' => [
                'category' => 'Speed Male Senior',
                'title'    => 'LIADZ Try to BPM',
                'artist'   => 'BanYa',
                'bpm'      => 'BPM 140-163', 
                'level'    => 'S21',
                'image'    => 'liadz.jpeg'
            ],
        ];

        // 2. Ambil Data Peserta (Disarankan Eager Loading Kategori)
        // Ganti 'category' dengan nama relasi yang benar di Model Participant Anda.
        $participants = Participant::with('category')->get(); 

        $this->info("Ditemukan " . $participants->count() . " peserta. Mulai memetakan kategori...");

        $successCount = 0;
        $failCount = 0;

        foreach ($participants as $participant) {
            
            // Asumsi Model Participant memiliki relasi 'category' dengan kolom 'name'
            // Ganti nama relasi dan kolom sesuai struktur database Anda.
            if ($participant->category && isset($participant->category->name)) {
                $categoryNameInDb = $participant->category->name;
            } else {
                // Fallback jika tidak ada kategori
                Log::warning("Peserta ID: " . $participant->id . " tidak memiliki kategori yang valid. Dilewati.");
                $failCount++;
                continue; 
            }

            // 3. Cocokkan Kategori DB dengan Peta Lagu
            if (array_key_exists($categoryNameInDb, $songDataMap)) {
                $songInfo = $songDataMap[$categoryNameInDb];

                // 4. Masukkan ke Antrean Pengiriman Email (Wajib gunakan queue!)
                try {
                    Mail::to($participant->email)->queue(new AnnouncementMail($participant, $songInfo));
                    $successCount++;
                } catch (\Exception $e) {
                    Log::error("Gagal mengirim email ke peserta ID: " . $participant->id . " - Error: " . $e->getMessage());
                    $failCount++;
                }
            } else {
                Log::warning("Peserta ID: " . $participant->id . " memiliki kategori '" . $categoryNameInDb . "' yang tidak memiliki lagu pilihan di script. Dilewati.");
                $failCount++;
            }
        }

        $this->info("Selesai. " . $successCount . " email berhasil diantrekan, " . $failCount . " email gagal/dilewati.");
        $this->info('Pastikan Anda telah menjalankan queue worker (php artisan queue:work).');
    }
}