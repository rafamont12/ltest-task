<?php

namespace App\Transformers;

use App\Models\Episode;
use Flugg\Responder\Transformers\Transformer;

class EpisodeTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'characters' => CharacterTransformer::class,
    ];

    /**
     * List of auto-loaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  Episode $episode
     * @return array
     */
    public function transform(Episode $episode)
    {
        return $episode->toArray();
    }
}
