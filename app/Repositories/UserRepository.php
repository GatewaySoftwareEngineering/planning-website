<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{

    public function search($data)
    {
        $query = User::latest();
        isset($data['name']) ?? $query->whereRaw("LOWER(`name`) LIKE '%" . strtolower($data['name']) . "%'");
        isset($data['email']) ?? $query->whereRaw("LOWER(`email`) LIKE '%" . strtolower($data['email']) . "%'");
        isset($data['role_id']) ?? $query->where('role_id', $data['role_id']);
        return $this->paginate($query->get());
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function update(User $user, $data)
    {
        if ($data['password'] && !Hash::check($data['password'], $user->password)) {
            //Logout from all devices
            $user->tokens
                ->each(function ($token) {
                    $this->revokeAccessAndRefreshTokens($token->id);
                });
        }
        $user->update($data);
        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }

    protected function revokeAccessAndRefreshTokens($tokenId)
    {
        $tokenRepository = app('Laravel\Passport\TokenRepository');
        $refreshTokenRepository = app('Laravel\Passport\RefreshTokenRepository');

        $tokenRepository->revokeAccessToken($tokenId);
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);
    }

}
