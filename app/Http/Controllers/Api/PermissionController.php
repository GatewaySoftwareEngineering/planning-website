<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permissions\PermissionStoreRequest;
use App\Http\Traits\RestfulRespond;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

/**
 * @group Permission management
 *
 * @authenticated
 */
class PermissionController extends Controller
{
    use RestfulRespond;
    protected $permissionRepository;
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the permissions.
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=200 scenario="unauthenticated user retrieve permissions " storage/responses/index-permission.json
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respond($this->permissionRepository->all());
    }

    /**
     * Store a newly created permission in storage.
     * @responseFile status=401 scenario="unauthenticated user" storage/responses/unauthenticated.json
     * @responseFile status=200 scenario="unauthenticated user creates new permission " storage/responses/store-permission.json
     * @param  \Illuminate\Http\PermissionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        return $this->respondWithMessage($this->permissionRepository->create($request->validated()),'Success');
    }

    /**
     * Display the specified permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified permission in storage.
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
     * Remove the specified permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
