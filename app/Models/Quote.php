<?php

namespace App\Models;

use App\Transformers\QuoteTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model implements Transformable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * Mass assignable attrs
     * @var string[]
     */
    protected $fillable = [
        'quote', 'episode_id', 'character_id'
    ];

    /**
     * Character hasMany Quote.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    /**
     * Episode hasMany Quote.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    /**
     * Transformer of the model for API responses.
     *
     * @return string
     */
    public function transformer()
    {
        return QuoteTransformer::class;
    }
}
