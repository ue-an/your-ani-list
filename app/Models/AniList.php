<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AniList extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'anime_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function anime(){
        return $this->belongsTo(Anime::class);
    }
}
