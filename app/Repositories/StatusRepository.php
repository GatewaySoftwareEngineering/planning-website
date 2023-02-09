<?php

namespace App\Repositories;

use App\Models\Board;
use App\Models\Status;
use App\Repositories\BaseRepository;

class StatusRepository extends BaseRepository
{
    public function search(Board $board, $data)
    {
        $query = Status::where('board_id', $board->id)->latest();
        isset($data['name']) ?? $query->whereRaw("LOWER(`name`) LIKE '%" . strtolower($data['name']) . "%'");
        return $this->paginate($query->get());
    }

    public function create(Board $board, $data)
    {
        $data['board_id'] = $board->id;
        return Status::create($data);
    }

    public function update(Status $status, $data)
    {
        $status->update($data);
        return $status;
    }

    public function delete(Status $status)
    {
        return $status->delete();
    }
}
