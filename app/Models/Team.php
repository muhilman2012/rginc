<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stage', 'final_points'];

    // Anggota Tim
    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}