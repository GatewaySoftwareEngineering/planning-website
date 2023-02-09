<?php

namespace App\Repositories;

use App\Models\Board;
use App\Models\Label;


class LabelRepository extends BaseRepository
{
    public function search(Board $board, $data)
    {
        $query = Label::where('board_id', $board->id)->latest();
        isset($data['name']) ?? $query->whereRaw("LOWER(`name`) LIKE '%" . strtolower($data['name']) . "%'");
        return $this->paginate($query->get());
    }

    public function create(Board $board, $data)
    {
        $data['board_id'] = $board->id;
        return Label::create($data);
    }

    public function update(Label $label, $data)
    {
        $label->update($data);
        return $label;
    }

    public function delete(Label $label)
    {
        return $label->delete();
    }
}
