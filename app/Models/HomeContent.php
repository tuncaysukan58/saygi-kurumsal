<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'hero_eyebrow', 'hero_title', 'hero_subtitle',
        'hero_primary_btn_text', 'hero_primary_btn_url',
        'hero_secondary_btn_text', 'hero_secondary_btn_url',
        'about_label', 'about_title', 'about_text', 'about_image', 'about_image_secondary', 'experience_years',
        'why_label', 'why_title', 'why_text',
        'process_label', 'process_title', 'process_text',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}
