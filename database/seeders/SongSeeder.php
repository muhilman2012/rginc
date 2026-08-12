<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        // ID Kategori:
        // 1 = Advance
        // 2 = Speed Female
        // 3 = Speed Male Junior
        // 4 = Speed Male Senior

        $songs = [
            // ==========================================
            // 1. SPEED ADVANCE
            // ==========================================
            // Penyisihan
            ['category_id' => 1, 'title' => 'Turkey Virus', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Banya-P Classic Remix', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Tream Vook of the war', 'level' => 'S14', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Prime Time', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Fire Noodle Challenge', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'B.P Classic Remix', 'level' => 'S14', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Dignity FS', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Canon D FS', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => '86 FS', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Baroque Virus', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Hush FS', 'level' => 'S15', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Bad Apple FS', 'level' => 'S14', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            // Semi Final
            ['category_id' => 1, 'title' => 'Punishment Restaurant', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'B3', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'The Last Rebellion', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Overnight Flower', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'T.B.H', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => '404 (New Era)', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Bang Bang', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Do the Dance', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Dreamchasers', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Freedom Dive', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Super Haraguro Pop', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Crash-Landing Rendezvous', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Infinite Enerzy', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Legendary Dominion', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Rise Up', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Lucky Star', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Antique Serenade', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Unfelicitas', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'King’s Tomb', 'level' => 'S17', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Pull Me Up', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Cynical', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Dizzy Dance, Street Light', 'level' => 'S16', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            // Final
            ['category_id' => 1, 'title' => 'Heliosphere', 'level' => 'S18', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'My Dreams', 'level' => 'S18', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Pump Me Amadeus', 'level' => 'S18', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'title' => 'Clue', 'level' => 'S18', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],


            // ==========================================
            // 2. SPEED FEMALE
            // ==========================================
            // Penyisihan
            ['category_id' => 2, 'title' => 'Ugly duck Toccata', 'level' => 'S17', 'round' => 'preliminary', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Money Fingers', 'level' => 'S17', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'WI-EX-DOC-VA', 'level' => 'S17', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Good Night FS', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Move That Body FS', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Chopstick Challenge FS', 'level' => 'S17', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Canon D FS', 'level' => 'S17', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Allegro Con Fuoco FS', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Baroque Virus FS', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Bad Apple FS', 'level' => 'S17', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            // Semi Final
            ['category_id' => 2, 'title' => 'Blazor', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'B3', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'The Last Rebellion', 'level' => 'S19', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Overnight Flower', 'level' => 'S19', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'T.B.H', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Dreamchasers', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Super Haraguro Pop', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Crash-Landing Rendezvous', 'level' => 'S19', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Quattuorux', 'level' => 'S19', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Legendary Dominion', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Lucky Star', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Unfelicitas', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'We Love Your Step', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'King’s Tomb', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Pull Me Up', 'level' => 'S19', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Dizzy Dance, Street Light', 'level' => 'S20', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            // Final
            ['category_id' => 2, 'title' => 'Extreme Music School 1st', 'level' => 'S20', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Kimchi Fingers', 'level' => 'S20', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Loki', 'level' => 'S20', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Percent X', 'level' => 'S20', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'I Want U', 'level' => 'S20', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Legendary Dominion', 'level' => 'S20', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'title' => 'Final Audition 2-1', 'level' => 'S21', 'round' => 'final', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],


            // ==========================================
            // 3. SPEED MALE JUNIOR
            // ==========================================
            // Penyisihan
            ['category_id' => 3, 'title' => 'District V', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Brown Sky', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Desaparecer', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Errorcode', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Fire Noodle Challenge', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Vulcan', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Leather', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Beethoven Influenza', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'What Are You Doin', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'B.P Classic Remix', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'PaPa helloizing', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'B.P Classic Remix 2', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Set Up Me2 Mix', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Team Vook of the war', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Banya Classic Remix', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Dr.KOA', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Bemera', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Repeatorment Remix', 'level' => 'S18', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Infinity Remix', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Chase Me FS', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Interference FS', 'level' => 'S19', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            // Semi Final
            ['category_id' => 3, 'title' => 'Enjoy The Show', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Punishment Restaurant', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Digitalis', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'The Last Rebellion', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => '404 (New Era)', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Bang Bang', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Night Theater', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Infinite Enerzy', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Antique Serenade', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Ercitite', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'title' => 'Cynical', 'level' => 'S21', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],


            // ==========================================
            // 4. SPEED MALE SENIOR
            // ==========================================
            // Penyisihan
            ['category_id' => 4, 'title' => 'Leather', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Beethoven Influenza', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Avalanquiem', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Paradoxx', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Vacuum Cleaner', 'level' => 'S20', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Msgoon RMX pt.6', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Caprice of DJ Otada', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'WI-EX-DOC-VA', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Love is a Danger Zone 2 (Try To B.P.M.)', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'EXTRA BanYa Remix', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Prime Time', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Desaparecer', 'level' => 'S22', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Distict V', 'level' => 'S22', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Good Night FS', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Full Moon FS', 'level' => 'S22', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Papasito FS', 'level' => 'S22', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Love is a Danger Zone 2 FS', 'level' => 'S20', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Beat of The War 2 FS', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => '86 FS', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Baroque Virus FS', 'level' => 'S21', 'round' => 'preliminary', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            // Semi Final
            ['category_id' => 4, 'title' => 'Enjoy The Show', 'level' => 'S23', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Blazor', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'The Last Rebellion', 'level' => 'S23', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Overnight Flower', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'T.B.H', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Freedom Dive', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Super Haraguro Pop', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Crash-Landing Rendezvous', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Infinite Enerzy', 'level' => 'S23', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Quattuorux', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Legendary Dominion', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Rise Up', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'Unfelicitas', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'We Love Your Step', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'title' => 'King’s Tomb', 'level' => 'S22', 'round' => 'semifinal', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('songs')->insert($songs);
    }
}