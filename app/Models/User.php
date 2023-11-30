<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    protected $hidden = ['password'];

    /**
     * Relation 1:M with roles
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relation M:1 with games
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    /**
     * Relation M:1 with Messages
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Relation M:M with Matches
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function matches(): BelongsToMany
    {
        return $this->belongsToMany(Matches::class, 'users_matches', 'user_id', 'matches_id');
    }
}
