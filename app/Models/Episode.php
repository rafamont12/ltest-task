<?php

namespace App\Models;

use App\Transformers\EpisodeTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model implements Transformable
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
     * Casts
     * @var string[]
     */
    protected $casts = [
        'air_date' => 'datetime:Y-m-d',
    ];

    /**
     * ManyToMany relation.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_episode', 'episode_id', 'character_id')->distinct();
    }

    /**
     * HasMany relation.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    /**
     * Transformer of the model for API responses.
     *
     * @return string
     */
    public function transformer()
    {
        return EpisodeTransformer::class;
    }
}
