<?php

namespace App\Http\Controllers\Api;

use App\Models\Board;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Traits\RestfulRespond;
use App\Http\Controllers\Controller;
use App\Repositories\LabelRepository;
use App\Http\Requests\Labels\LabelShowRequest;
use App\Http\Requests\Labels\LabelIndexRequest;
use App\Http\Requests\Labels\LabelStoreRequest;
use App\Http\Requests\Labels\LabelDeleteRequest;
use App\Http\Requests\Labels\LabelUpdateRequest;

/**
 * @group Label management
 *
 * @authenticated
 */
class LabelController extends Controller
{
    use RestfulRespond;

    protected $labelRepository;
    public function __construct(LabelRepository $labelRepository)
    {
        $this->labelRepository = $labelRepository;
    }

    /**
     * Display a listing of the labels.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user browses label" storage/responses/browse-label.json
     * @param  \Illuminate\Http\StatusIndexRequest  $request
     * @param  Board $board
     * @return \Illuminate\Http\Response
     */
    public function index(LabelIndexRequest $request, Board $board)
    {
        return $this->respondWithPagination($this->labelRepository->search($board, $request->validated()));
    }

    /**
     * Store a newly created label in storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user creates new label" storage/responses/store-label.json
     * @param  \Illuminate\Http\LabelStoreRequest  $request
     * @param  Board $board
     * @return \Illuminate\Http\Response
     */
    public function store(LabelStoreRequest $request, Board $board)
    {
        return $this->respondWithMessage($this->labelRepository->create($board, $request->validated()), 'Success');
    }

    /**
     * Display the specified label.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user shows label" storage/responses/show-label.json
     * @param  \Illuminate\Http\LabelShowRequest  $request
     * @param  Board $board
     * @param  Label $label
     * @return \Illuminate\Http\Response
     */
    public function show(LabelShowRequest $request,Board $board, Label $label)
    {
        return $this->respondWithMessage($label, 'Success');
    }

    /**
     * Update the specified label in storage.
     *
     *@responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user updates a status" storage/responses/update-label.json
     * @param  \Illuminate\Http\LabelUpdateRequest  $request
     * @param  Board  $board
     * @param  Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(LabelUpdateRequest $request, Board $board, Label  $label)
    {
        return $this->respondWithMessage($this->labelRepository->update($label, $request->validated()), 'Success');
    }

    /**
     * Remove the specified label from storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user deletes a label" storage/responses/delete-label.json
     * @param  Label $label
     * @param  Board $board
     * @param  \Illuminate\Http\StatusDeleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabelDeleteRequest $request,Board $board, Label $label)
    {
        return $this->respondWithMessage($this->labelRepository->delete($label, $request->validated()), 'Success');
    }
}
