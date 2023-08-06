<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ownWorkspaces(): BelongsToMany
    {
        return $this->belongsToMany(WorkSpace::class)->using(Member::class);
    }

    public function threads(): BelongsToMany
    {
        return $this->belongsToMany(Thread::class)
            ->using(Participant::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }

    public function mention():BelongsToMany
    {
        return $this->belongsToMany(Post::class)
            ->using(Mention::class)
            ->withPivot('unread')
            ->withTimestamps();
    }
}
