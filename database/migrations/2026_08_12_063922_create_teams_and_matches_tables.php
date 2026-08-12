<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Tim
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Tim A"
            $table->enum('stage', ['semifinal', 'final', 'eliminated'])->default('semifinal');
            $table->integer('final_points')->default(0); // Poin liga di babak final
            $table->timestamps();
        });

        // Tabel Anggota Tim
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('participant_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // Tabel Pertandingan (Battle)
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('round_name'); // 'semifinal', 'final_week_3', 'final_week_4', 'final_week_5'
            $table->foreignId('team1_id')->constrained('teams')->cascadeOnDelete();
            $table->foreignId('team2_id')->constrained('teams')->cascadeOnDelete();
            
            // Total akumulasi skor (diupdate otomatis/manual oleh admin)
            $table->bigInteger('team1_score')->default(0); 
            $table->bigInteger('team2_score')->default(0);
            
            // Status Pemenang
            $table->foreignId('winner_team_id')->nullable()->constrained('teams');
            $table->boolean('is_draw')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('teams');
    }
};