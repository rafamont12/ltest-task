<?php

namespace App\Models;

use App\Transformers\CharacterTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model implements Transformable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * Mass assignable attrs
     * @var string[]
     */
    protected $fillable = [
        'name', 'birthday', 'occupations', 'img', 'nickname', 'portrayed'
    ];

    /**
     * Casts
     * @var string[]
     */
    protected $casts = [
        'occupations' => 'array',
        'birthday' => 'datetime:Y-m-d',
    ];

    /**
     * ManyToMany relation.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function episodes()
    {
        return $this->belongsToMany(Character::class, 'character_episode', 'character_id', 'episode_id')->distinct();
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
        return CharacterTransformer::class;
    }
}
