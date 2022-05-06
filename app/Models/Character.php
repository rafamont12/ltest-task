<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    /**
     * Mass assignable attrs
     * @var string[]
     */
    protected $fillable = [
        'name', 'birthday', 'occupations', 'img', 'nickname', 'portrayed'
    ];

    /**
     * ManyToMany relation.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function episodes()
    {
        return $this->belongsToMany(Character::class, 'character_episode', 'character_id', 'episode_id');
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
