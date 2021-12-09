<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id',
        'title',
        'description',
        'genre',
        'year',
    ];

    public function anilist()
    {
        return $this->hasOne(AniList::class);
    }

    // public function anilist(){
    //     return $this->belongsTo(AniList::class);
    // }
}
