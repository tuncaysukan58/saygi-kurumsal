<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceLogo extends Model
{
    protected $fillable = ['name', 'logo', 'url', 'order'];
}
