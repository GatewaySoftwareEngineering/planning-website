<?php

namespace App\Http\Controllers\Api;

use App\Enums\InviteUserToBoardCase;
use App\Http\Traits\RestfulRespond;
use App\Http\Controllers\Controller;
use App\Http\Requests\Boards\BoardDeleteRequest;
use App\Repositories\BoardRepository;
use App\Http\Requests\Boards\BoardShowRequest;
use App\Http\Requests\Boards\BoardIndexRequest;
use App\Http\Requests\Boards\BoardInviteUserRequest;
use App\Http\Requests\Boards\BoardStoreRequest;
use App\Http\Requests\Boards\BoardUpdateRequest;
use App\Models\Board;

/**
 * @group Board management
 *
 * @authenticated
 */
class BoardController extends Controller
{
    use RestfulRespond;

    protected $boardRepository;
    public function __construct(BoardRepository $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }

    /**
     * Display a listing of the boards.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user creates new user" storage/responses/browse-board.json
     * @param  \Illuminate\Http\BoardIndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(BoardIndexRequest $request)
    {
        return $this->respondWithPagination($this->boardRepository->search($request->validated()));
    }

    /**
     * Store a newly created board in storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user creates new user" storage/responses/store-board.json
     * @param  \Illuminate\Http\BoardStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoardStoreRequest $request)
    {
        return $this->respondWithMessage($this->boardRepository->create($request->validated()), 'Success');
    }

    /**
     * Display the specified board.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user creates new board" storage/responses/show-board.json
     * @param  \Illuminate\Http\BoardShowRequest  $request
     * @param  Board $board
     * @return \Illuminate\Http\Response
     */
    public function show(BoardShowRequest $request, Board $board)
    {
        return $this->respondWithMessage($board, 'Success');
    }

    /**
     * Update the specified board in storage.
     *
     *@responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user updates a board" storage/responses/update-board.json
     * @param  \Illuminate\Http\BoardUpdateRequest  $request
     * @param  Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(BoardUpdateRequest $request, Board $board)
    {
        return $this->respondWithMessage($this->boardRepository->update($board, $request->validated()), 'Success');
    }

    /**
     * Remove the specified board from storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user deletes a board" storage/responses/delete-board.json
     * @param  Board  $board
     * @param  \Illuminate\Http\BoardDeleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardDeleteRequest $request, Board $board)
    {
        return $this->respondWithMessage($this->boardRepository->delete($board, $request->validated()), 'Success');
    }

    /**
     * Invite user to board
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user invite specified user to a board" storage/responses/invite-to-board.json
     * @param  Board  $board
     * @param  \Illuminate\Http\BoardInviteUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function invite(BoardInviteUserRequest $request, Board $board)
    {
        $result = $this->boardRepository->invite($board, $request->validated());
        switch ($result) {
            case InviteUserToBoardCase::UserNotActive:
                return $this->respondForbidden('User is not active');
                break;
            case InviteUserToBoardCase::AlreadyInvited:
                return $this->respondForbidden('User is already invited');
                break;
            default:
                return $this->respondWithMessage($board, 'Success');
                break;
        }
    }
}
