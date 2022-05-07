<?php

namespace App\Models;

use Flugg\Responder\Http\Responses\ErrorResponseBuilder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Generating Bearer Token.
     *
     * @return ErrorResponseBuilder|string
     */
    public function getBearerToken()
    {
        // Removing old tokens
        if ($this->tokens->count() > 0) {
            foreach ($this->tokens as $token) {
                $token->delete();
            }
        }

        // Return token
        return $this->createToken('TokenApiBreakingBadTest')->plainTextToken;
    }
}
