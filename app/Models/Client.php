<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'website',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
