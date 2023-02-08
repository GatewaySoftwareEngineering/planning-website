<?php

namespace App\Repositories;

use App\Enums\InviteUserToBoardCase;
use App\Models\User;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;

class BoardRepository extends BaseRepository
{
    public function search($data)
    {
        $query = Board::canBrowse()->latest();
        isset($data['name']) ?? $query->whereRaw("LOWER(`name`) LIKE '%" . strtolower($data['name']) . "%'");
        return $this->paginate($query->get());
    }

    public function create($data)
    {
        $data['user_id'] = auth()->user()->id;
        $board = Board::create($data);
        $board->users()->attach(Auth::user()->id);
        return $board;
    }

    public function update(Board $board, $data)
    {
        $board->update($data);
        return $board;
    }

    public function delete(Board $board)
    {
        return $board->delete();
    }

    public function invite(Board $board, $data)
    {
        $user = User::find($data['user_id']);
        if (!$user->active) {
            return InviteUserToBoardCase::UserNotActive;
        }
        if ($board->users()->where('users.id', $user->id)->exists()) {
            return InviteUserToBoardCase::AlreadyInvited();
        }
        $board->users()->attach($user->id);
        return InviteUserToBoardCase::Done;
    }
}
