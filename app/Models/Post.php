<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false; 

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
