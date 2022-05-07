<?php

namespace App\Transformers;

use App\Models\Quote;
use Flugg\Responder\Transformers\Transformer;

class QuoteTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of auto-loaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  Quote $quote
     * @return array
     */
    public function transform(Quote $quote)
    {
        $data = $quote->toArray();

        $data['episode'] = $quote->episode->title;
        $data['character'] = $quote->character->name;

        return $data;
    }
}
