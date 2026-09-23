<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'slug'];

    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    // HasSlug trait uses $model->title to build the slug; alias it to name.
    public function getTitleAttribute(): ?string
    {
        return $this->attributes['name'] ?? null;
    }
}
