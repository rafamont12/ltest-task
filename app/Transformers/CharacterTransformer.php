<?php

namespace App\Transformers;

use App\Models\Character;
use Flugg\Responder\Transformers\Transformer;

class CharacterTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'quotes' => QuoteTransformer::class,
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
     * @param  Character $character
     * @return array
     */
    public function transform(Character $character)
    {
        $data = $character->toArray();

        $data['quotes'] = $character->quotes->pluck('id');
        $data['episodes'] = $character->episodes->pluck('id');

        return $data;
    }
}
