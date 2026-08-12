<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_code',
        'name',
        'ig_username',
        'whatsapp_number',
        'email',
        'am_pass_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}