<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'eyebrow', 'title', 'subtitle', 'image',
        'primary_btn_text', 'primary_btn_url',
        'secondary_btn_text', 'secondary_btn_url',
        'order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
