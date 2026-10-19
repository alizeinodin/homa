<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'handle',
        'image',
        'tweet',
        'file',
        'is_video',
        'comments',
        'retweets',
        'likes',
        'analytics',
    ];

    protected $casts = [
        'is_video' => 'boolean',
    ];
}
