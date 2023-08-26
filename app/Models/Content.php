<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    public function from(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function mention(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(Mention::class)
            ->withPivot('unread')
            ->withTimestamps();
    }
}
