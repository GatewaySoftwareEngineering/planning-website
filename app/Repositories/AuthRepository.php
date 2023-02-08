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
               // RateLimiter::clear(Auth::throttleKey($request));
                return response(['user' => new UserResource($user), 'token' => $user->createToken('MyApp')->accessToken]);
            }

        } else {
            // $key=Auth::throttleKey($request);
            // $allowedAttemptCount=5;
            // RateLimiter::hit($key);
            // if (!RateLimiter::tooManyAttempts($key, $allowedAttemptCount)) {
            //     return $this->respondNotAuthorized(__('response.invalid_email_or_password_with_count', ['attempts_count' => $allowedAttemptCount - RateLimiter::attempts($key)]));
            // }
            // $user = User::where('email', $request->email)->first();
            // if ($user) {
            //     //Deactivate the account
            //     $user->update(['is_active' => 0]);

            //     //Logout from all devices
            //     $user->tokens
            //         ->each(function ($token) {
            //             $this->revokeAccessAndRefreshTokens($token->id);
            //         });
            //     return $this->respondNotAuthorized(__('response.failed_login_attempts'));
            // } else {
            return $this->respondNotAuthorized(__('Incorrect E-mail or password'));
           // }
        }
    }
}
