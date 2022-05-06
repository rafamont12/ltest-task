<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    /**
     * Mass assignable attrs
     * @var string[]
     */
    protected $fillable = [
        'title', 'air_date'
    ];

    /**
     * ManyToMany relation.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_episode', 'episode_id', 'character_id');
    }

    /**
     * HasMany relation.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
