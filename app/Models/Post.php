<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    public function from(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mention(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(Mention::class);
    }

    public function content():HasOne
    {
        return $this->hasOne(Content::class);
    }
}
