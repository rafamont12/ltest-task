<?php

namespace App\Http\Controllers;

use App\Http\Requests\CredentialsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getToken(CredentialsRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        // Check
        if (!$user || !Hash::check($request->password, $user->password)) {
            return responder()->error(401, 'Wrong Credentials.');
        }

        // Removing old tokens
        if ($user->tokens->count() > 0) {
            foreach ($user->tokens as $token) {
                $token->delete();
            }
        }

        return responder()->success([
            'token' => $user->createToken('TokenApiBreakingBadTest')->plainTextToken
        ]);
    }
}
