<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Traits\RestfulRespond;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ImportUserRequest;
use App\Repositories\UserRepository;
use App\Http\Requests\Users\UserShowRequest;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserDeleteRequest;
use App\Http\Requests\Users\UserIndexRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;

/**
 * @group user management
 *
 * @authenticated
 */
class UserController extends Controller
{
    use RestfulRespond;

    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user creates new user" storage/responses/browse-user.json
     * @param  \Illuminate\Http\UserIndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(UserIndexRequest $request)
    {
        return $this->respondWithPagination($this->userRepository->search($request->validated()));
    }

    /**
     * Store a newly created user in storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user browses users" storage/responses/store-user.json
     * @param  \Illuminate\Http\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        return $this->respondWithMessage($this->userRepository->create($request->validated()), 'Success');
    }

    /**
     * Display the specified user.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user shows status" storage/responses/show-user.json
     * @param  \Illuminate\Http\UserShowRequest  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(UserShowRequest $request, User $user)
    {
        return $this->respondWithMessage($user, 'Success');
    }

    /**
     * Update the specified user in storage.
     *
     *@responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user updates a user" storage/responses/update-user.json
     * @param  \Illuminate\Http\UserUpdateRequest  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        return $this->respondWithMessage($this->userRepository->update($user, $request->validated()), 'Success');
    }

    /**
     * Remove the specified user from storage.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user deletes a user" storage/responses/delete-user.json
     * @param  User  $user
     * @param  \Illuminate\Http\UserDeleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeleteRequest $request, User $user)
    {
        return $this->respondWithMessage($this->userRepository->delete($user, $request->validated()), 'Success');
    }

    /**
     * Import users from excel file.
     *
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user imports users" storage/responses/import-user.json
     * @param  User  $user
     * @param  \Illuminate\Http\ImportUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function import(ImportUserRequest $request)
    {
        $file=$request->file('file')->store('public/users');
        Excel::import(new ImportUser, $file);
        return $this->respond(["message" => "users have been imported successfully"]);
    }
}
