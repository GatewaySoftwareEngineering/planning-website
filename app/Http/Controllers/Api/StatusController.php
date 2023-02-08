<?php

namespace App\Http\Controllers\Api;

use App\Models\Board;
use App\Models\Status;
use App\Http\Traits\RestfulRespond;
use App\Http\Controllers\Controller;
use App\Repositories\StatusRepository;
use App\Http\Requests\Statuses\StatusShowRequest;
use App\Http\Requests\Statuses\StatusIndexRequest;
use App\Http\Requests\Statuses\StatusStoreRequest;
use App\Http\Requests\Statuses\StatusDeleteRequest;
use App\Http\Requests\Statuses\StatusUpdateRequest;

/**
 * @group status management
 *
 * @authenticated
 */
class StatusController extends Controller
{
    use RestfulRespond;

    protected $statusRepository;
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Display a listing of the status.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user browses statuses" storage/responses/browse-status.json
     * @param  \Illuminate\Http\StatusIndexRequest  $request
     * @param  Board $board
     * @return \Illuminate\Http\Response
     */
    public function index(StatusIndexRequest $request, Board $board)
    {
        return $this->respondWithPagination($this->statusRepository->search($board, $request->validated()));
    }

    /**
     * Store a newly created status in storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user creates new status" storage/responses/store-status.json
     * @param  \Illuminate\Http\StatusStoreRequest  $request
     * @param  Board $board
     * @return \Illuminate\Http\Response
     */
    public function store(StatusStoreRequest $request, Board $board)
    {
        return $this->respondWithMessage($this->statusRepository->create($board, $request->validated()), 'Success');
    }

    /**
     * Display the specified status.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user shows status" storage/responses/show-status.json
     * @param  \Illuminate\Http\StatusShowRequest  $request
     * @param  Board $board
     * @param  Status $status
     * @return \Illuminate\Http\Response
     */
    public function show(StatusShowRequest $request, Board $board, Status $status)
    {
        return $this->respondWithMessage($status, 'Success');
    }

    /**
     * Update the specified status in storage.
     *
     *@responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user updates a status" storage/responses/update-status.json
     * @param  \Illuminate\Http\StatusUpdateRequest  $request
     * @param  Board  $board
     * @param  Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, Board $board, Status  $status)
    {
        return $this->respondWithMessage($this->statusRepository->update($status, $request->validated()), 'Success');
    }

    /**
     * Remove the specified status from storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user deletes a status" storage/responses/delete-status.json
     * @param  Status $status
     * @param  Board $board
     * @param  \Illuminate\Http\StatusDeleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusDeleteRequest $request, Board $board, Status $status)
    {
        return $this->respondWithMessage($this->statusRepository->delete($status, $request->validated()), 'Success');
    }
}
