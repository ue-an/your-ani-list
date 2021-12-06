<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AniList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'anime_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
