<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceItem extends Model
{
    protected $fillable = ['service_id', 'title', 'description', 'order'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
