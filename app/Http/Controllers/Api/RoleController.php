<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Http\Traits\RestfulRespond;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Http\Requests\Roles\RoleStoreRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;

/**
 * @group Role management
 *
 * @authenticated
 */
class RoleController extends Controller
{
    use RestfulRespond;

    protected $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of roles.
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=200 scenario="unauthenticated user retrieve roles " storage/responses/index-role.json
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respond($this->roleRepository->all());
    }

    /**
     * Store a newly created role in storage.
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=200 scenario="unauthenticated user create new role" storage/responses/store-role.json
     *
     * @param  \Illuminate\Http\RoleStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        return $this->respondWithMessage($this->roleRepository->create($request->validated()), 'Success');
    }

    /**
     * Display the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified role in storage.
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=200 scenario="unauthenticated user create new role" storage/responses/update-role.json
     *
     * @param  \Illuminate\Http\RoleUpdateRequest  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        return $this->respondWithMessage($this->roleRepository->update($role, $request->validated()),'Success');
    }

    /**
     * Remove the specified role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
