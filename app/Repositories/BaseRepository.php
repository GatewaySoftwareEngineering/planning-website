<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class  BaseRepository
{
    /**
     * @param $items
     * @param  int  $limit
     * @param  null  $page
     * @param  array  $options
     * @return LengthAwarePaginator
     */
    public function paginate($items)
    {
        $page  = request('page') ?: (Paginator::resolveCurrentPage() ?: 1);
        $limit = request('limit') ?: 10;
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $limit), $items->count(), $limit, $page);
    }
}
