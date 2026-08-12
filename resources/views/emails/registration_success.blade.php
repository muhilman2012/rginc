<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pendaftaran MIGHTY ONE!</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f5; color: #333; margin: 0; padding: 20px; }
        .container { max-w-width: 600px; margin: 0 auto; background-color: #1e293b; border-radius: 12px; overflow: hidden; }
        .header { background-color: #0f172a; padding: 30px; text-align: center; border-bottom: 3px solid #d4af37; }
        .logos { display: flex; justify-content: center; align-items: center; gap: 20px; margin-bottom: 15px; }
        .logos img { height: 50px; object-fit: contain; }
        .content { padding: 30px; color: #f8fafc; line-height: 1.6; }
        .highlight { color: #d4af37; font-weight: bold; }
        .code-box { background-color: #0f172a; border: 1px dashed #d4af37; padding: 15px; text-align: center; margin: 20px 0; border-radius: 8px; font-size: 24px; font-family: monospace; font-weight: bold; color: #4ade80; }
        .footer { background-color: #0f172a; padding: 20px; text-align: center; font-size: 12px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="container" style="max-width: 600px; margin: 0 auto;">
        <div class="header">
            <!-- Menampilkan 3 Logo. Pastikan file gambar ada di folder public/logo/ -->
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{ $message->embed(public_path('logo/rginc.png')) }}" alt="RGINC" style="height: 50px; margin: 0 10px;">
                <img src="{{ $message->embed(public_path('logo/M81_logo.png')) }}" alt="M81" style="height: 50px; margin: 0 10px;">
                <img src="{{ $message->embed(public_path('logo/phoenix2.png')) }}" alt="PIU Phoenix 2" style="height: 50px; margin: 0 10px;">
            </div>
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; text-transform: uppercase;">Selamat Datang di M81!</h1>
        </div>
        
        <div class="content" style="background-color: #1e293b; padding: 30px; color: #ffffff;">
            <p>Halo, <span class="highlight">{{ $participant->name }}</span>!</p>
            <p>Pendaftaran Anda untuk turnamen <strong>MIGHTY ONE! (M81)</strong> telah berhasil kami terima. Berikut adalah detail pendaftaran Anda:</p>
            
            <ul style="color: #cbd5e1;">
                <li><strong>Kategori:</strong> {{ $participant->category->name }}</li>
                <li><strong>AM.Pass ID:</strong> {{ $participant->am_pass_id }}</li>
                <li><strong>IG Username:</strong> {{ $participant->ig_username }}</li>
            </ul>

            <p>Gunakan Kode Peserta di bawah ini untuk melakukan <strong style="color: #d4af37;">Upload Skor Penyisihan</strong> di website kami:</p>
            
            <div class="code-box" style="background-color: #0f172a; border: 2px dashed #d4af37; padding: 20px; text-align: center; border-radius: 10px; font-size: 28px; font-weight: bold; color: #4ade80; letter-spacing: 2px;">
                {{ $participantCode }}
            </div>

            <p style="margin-top: 20px;"><strong>Timeline Penting:</strong></p>
            <ul style="color: #cbd5e1;">
                <li>Penyisihan / Input Skor: 18 - 23 Agustus 2026</li>
                <li>Pengumuman Top 8: 25 Agustus 2026</li>
            </ul>

            <p>Persiapkan diri Anda, berlatih dengan maksimal, dan sampai jumpa di arena!</p>
        </div>

        <div class="footer">
            <p>&copy; 2026 Reborn to Glory Incorporated (RGINC). All rights reserved.</p>
        </div>
    </div>
</body>
</html>