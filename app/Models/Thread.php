<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Thread extends Model
{
    use HasFactory;

    public function workSpace(): BelongsTo
    {
        return $this->belongsTo(WorkSpace::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(Participant::class);
    }
}
