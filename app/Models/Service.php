<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'icon', 'icon_image', 'cover_image', 'short_desc', 'content', 'order', 'is_active',
        'seo_title', 'seo_description', 'seo_keywords',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(ServiceItem::class)->orderBy('order');
    }
}
