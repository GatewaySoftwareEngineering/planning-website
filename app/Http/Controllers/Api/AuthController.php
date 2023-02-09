<?php

namespace App\Http\Controllers\Api;

use App\Http\Traits\RestfulRespond;
use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use Laravel\Passport\TokenRepository;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\Auth\LogoutRequest;

/**
 * @group Authentication
 */
class AuthController extends Controller
{
    use RestfulRespond;
    protected $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    /**
     * Login
     * @responseFile status=200 scenario="When E-mail and password are valid and user is active" storage/responses/login.json
     * @responseFile status=401 scenario="Invalid credentials" storage/responses/invalid-credentials.json
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        return $this->authRepository->login($request);
    }

    /**
     * Logout
     * @responseFile status=200 scenario="When authenticated" storage/responses/logout.json
     * @responseFile status=401 storage/responses/unauthenticated.json
     * @param LogoutRequest $request
     */
    public function logout(LogoutRequest $request)
    {
        $accessToken = auth()->user()->token();

        // logout from only current device
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($accessToken->id);
        return $this->respondWithMessage(null,'Logout successfully');
    }
}
