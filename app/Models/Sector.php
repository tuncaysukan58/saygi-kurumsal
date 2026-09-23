<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sector extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'icon', 'icon_image', 'description', 'order',
        'seo_title', 'seo_description', 'seo_keywords',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
