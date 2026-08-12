<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'song_id',
        'score_value',
        'proof_image_path',
        'round',
        'status',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}