<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Traits\RestfulRespond;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Http\Requests\Tasks\TaskMoveRequest;
use App\Http\Requests\Tasks\TaskShowRequest;
use App\Http\Requests\Tasks\TaskIndexRequest;
use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Http\Requests\Tasks\TaskAssignRequest;
use App\Http\Resources\Tasks\TaskShowResource;

class TaskController extends Controller
{
    use RestfulRespond;

    protected $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the tasks.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user browses tasks" storage/responses/browse-task.json
     * @param  \Illuminate\Http\TaskIndexRequest  $request
     * @return \Illuminate\Http\Response
     **/
    public function index(TaskIndexRequest $request, Board $board)
    {
        return $this->respondWithPagination($this->taskRepository->search($board, $request->validated()));
    }


    /**
     * Store a newly created task in storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user creates new task" storage/responses/store-task.json
     * @param  \Illuminate\Http\TaskStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request, Board $board)
    {
        return $this->respondWithMessage($this->taskRepository->create($board, $request->validated()), 'Success');
    }

    /**
     * View task with log.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user assigns a task to user" storage/responses/assign-task.json
     * @param  \Illuminate\Http\TaskShowRequest  $request
     * @param Board $board
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(TaskShowRequest $request, Board $board, Task $task)
    {
        return $this->respondWithMessage( new TaskShowResource($task), 'Success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Assign task to user.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user assigns a task to user" storage/responses/assign-task.json
     * @param  \Illuminate\Http\TaskAssignRequest  $request
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function assign(TaskAssignRequest $request, Board $board, Task $task)
    {
        return $this->respondWithMessage($this->taskRepository->assign($task, $request->validated()), 'Success');
    }

    /**
     * move a task to another status.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user moves a task to another status" storage/responses/move-task.json
     * @param  \Illuminate\Http\TaskMoveRequest  $request
     * @param Board $board
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function move(TaskMoveRequest $request, Board $board, Task $task)
    {
        return $this->respondWithMessage($this->taskRepository->move($task, $request->validated()), 'Success');
    }
}
