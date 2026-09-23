<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasSlug;

    protected $fillable = [
        'sector_id', 'title', 'slug', 'cover_image', 'summary', 'content',
        'result_metric', 'is_featured', 'order',
        'seo_title', 'seo_description', 'seo_keywords',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }
}
