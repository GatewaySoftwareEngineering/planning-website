<?php

namespace App\Repositories;

use App\Models\User;
use App\Http\Traits\RestfulRespond;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\auth\LoginRequest;
use Illuminate\Support\Facades\RateLimiter;

class AuthRepository
{
    use RestfulRespond;

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
            if (!$user->active) {
                return $this->respondConflict(__('response.account_is_not_activated'));
            } else {
                return response(['user' => new UserResource($user), 'token' => $user->createToken('MyApp')->accessToken]);
            }
        } else {
            return $this->respondNotAuthorized(__('Incorrect E-mail or password'));
        }
    }
}
