<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mighty One 2026: Informasi Lagu Pilihan Kategori Anda!</title>
    <style>
        /* Gaya dasar untuk email agar terlihat modern */
        body {
            margin: 0;
            padding: 0;
            background-color: #0f172a; /* Warna latar belakang gelap dari poster */
            font-family: Arial, Helvetica, sans-serif;
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        /* Responsivitas dasar */
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
            }
            .content-box {
                padding: 20px !important;
            }
            .song-title {
                font-size: 24px !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #0f172a; color: #ffffff;">

    <!-- Latar Belakang Email (Pola tersirat dengan warna seragam) -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #0f172a; padding: 40px 0;">
        <tr>
            <td align="center">
                <!-- Kontainer Email Utama -->
                <table class="email-container" width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #1e293b; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.5);">
                    
                    <!-- 1. HEADER: Logo M81 -->
                    <tr>
                        <td align="center" style="padding: 30px 20px 20px 20px; background-color: rgba(255, 255, 255, 0.03);">
                            <!-- Ganti URL_LOGO_M81 dengan URL asli logo M81 Anda di internet -->
                            <img src="https://rginc.online/logo/M81_logo.png" alt="Logo M81" style="height: 60px; object-fit: contain;">
                            <p style="color: #d4af37; font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; margin: 8px 0 0 0;">RGInc Mighty One</p>
                        </td>
                    </tr>

                    <!-- 2. BODY: Konten Utama -->
                    <tr>
                        <td class="content-box" style="padding: 40px; text-align: center;">
                            <h2 style="color: #ffffff; font-size: 20px; font-weight: 900; line-height: 1.3; text-transform: uppercase; margin-bottom: 20px;">
                                Halo, {{ $participant->name }}!
                            </h2>
                            <p style="color: #d1d5db; font-size: 14px; line-height: 1.6; margin-bottom: 30px;">
                                Pendaftaran kompetisi Mighty One resmi ditutup. Terima kasih atas antusiasme Anda! Berikut kami informasikan lagu pilihan khusus untuk kategori Anda:
                            </p>

                            <!-- ================= KARTU INFORMASI LAGU ================= -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #1a202c; border: 1px solid #d4af37; border-radius: 12px; margin-bottom: 30px; border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; overflow: hidden;">
                                
                                <!-- Kategori -->
                                <tr>
                                    <td style="padding: 20px 20px 15px 20px;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="30" style="color: #d4af37; font-size: 20px;">
                                                    @if($songInfo['category'] == 'Advance') ⚡ @elseif($songInfo['category'] == 'Speed Female') ♀ @elseif($songInfo['category'] == 'Speed Male Junior') ♂J @else ♂S @endif
                                                </td>
                                                <td style="color: #ffffff; font-size: 16px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; padding-left: 10px;">
                                                    {{ $songInfo['category'] }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Gambar Lagu -->
                                <tr>
                                    <td align="center" style="padding: 0 20px 15px 20px;">
                                        <!-- Menggunakan fungsi url() agar link gambar bersifat absolut (wajib untuk email) -->
                                        <img src="{{ url('song/' . $songInfo['image']) }}" alt="{{ $songInfo['title'] }}" style="width: 100%; max-width: 400px; height: auto; border-radius: 8px; border: 1px solid #334155; display: block;">
                                    </td>
                                </tr>

                                <!-- Judul Lagu Besar -->
                                <tr>
                                    <td class="song-title" style="padding: 0 20px 15px 20px; color: #ffffff; font-size: 26px; font-weight: 900; text-transform: uppercase; line-height: 1.2;">
                                        {{ $songInfo['title'] }} <br>
                                        <span style="color: #d4af37;">Remix</span> 
                                        {{ $songInfo['level'] }}
                                    </td>
                                </tr>

                                <!-- Detail Lagu Kecil -->
                                <tr>
                                    <td style="padding: 0 20px 20px 20px;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="color: #9ca3af; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                                                    {{ $songInfo['artist'] }}
                                                </td>
                                                <td align="right" style="color: #9ca3af; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                                                    {{ $songInfo['bpm'] }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- ================= INSTRUKSI & TOMBOL ================= -->
                            <p style="color: #e5e7eb; font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                                Silakan mainkan lagu pilihan tersebut dan dapatkan skor semaksimal mungkin. Setelah itu, segera unggah (upload) skor Anda melalui tautan di bawah ini:
                            </p>
                            
                            <!-- Tombol Input Skor -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 12px;">
                                <tr>
                                    <td align="center">
                                        <a href="https://rginc.online/score/login" target="_blank" style="background-color: #d4af37; color: #0f172a; padding: 14px 28px; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 8px; display: inline-block; text-transform: uppercase; letter-spacing: 1px;">
                                            Input Skor Sekarang
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Keterangan Abaikan -->
                            <p style="color: #64748b; font-size: 11px; margin-top: 0; margin-bottom: 20px; text-align: center;">
                                <strong>Abaikan pesan ini jika Anda sudah melakukan input skor</strong>
                            </p>

                            <!-- Alert Kesempatan -->
                            <p style="color: #fbbf24; font-size: 12px; font-weight: bold; font-style: italic; background-color: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.3); padding: 10px; border-radius: 6px;">
                                *Lebih cepat input skor, lebih besar kesempatan Anda untuk lolos ke tahap selanjutnya!
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 20px; background-color: rgba(255, 255, 255, 0.03);">
                            <div style="margin-bottom: 12px;">
                                <img src="https://rginc.online/logo/rginc.png" alt="Logo RGinc" style="height: 40px; object-fit: contain; margin: 0 10px; display: inline-block; vertical-align: middle;">
                                <img src="https://rginc.online/logo/M81_logo.png" alt="Logo M81" style="height: 40px; object-fit: contain; margin: 0 10px; display: inline-block; vertical-align: middle;">
                            </div>
                            <p style="color: #9ca3af; font-size: 9px; margin: 0;">&copy; Mighty One 2026. Anniversary & Semarak Kemerdekaan RI.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>