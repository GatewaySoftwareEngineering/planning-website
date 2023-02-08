<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use App\Http\Requests\auth\LoginRequest;

/**
 * @group Authentication
 */
class AuthController extends Controller
{
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
}
