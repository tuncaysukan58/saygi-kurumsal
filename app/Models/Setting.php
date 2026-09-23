<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'phone_primary', 'phone_secondary', 'whatsapp', 'email', 'address',
        'facebook_url', 'instagram_url', 'linkedin_url', 'youtube_url',
        'logo_path', 'footer_text', 'seo_title', 'seo_description',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}
