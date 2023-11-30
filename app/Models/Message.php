<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    
    /**
     * Relation 1:M with Users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Relation 1:M with Matches
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function match(): BelongsTo
    {
        return $this->belongsTo(Matches::class);
    }
}
