<?php

use App\Http\Controllers\Api\AssetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\LabelController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});


Route::middleware('auth:api')->group(function () {
    Route::post('import', [UserController::class, 'import']);
    Route::post('upload', [AssetController::class, 'upload']);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('users', UserController::class);
    Route::put('boards/{board}/invite', [BoardController::class, 'invite']);
    Route::apiResource('boards', BoardController::class);
    Route::scopeBindings()->apiResource('boards.statuses', StatusController::class);
    Route::scopeBindings()->apiResource('boards.labels', LabelController::class);
    Route::scopeBindings()->put('boards/{board}/tasks/{task}/assign',  [TaskController::class, 'assign']);
    Route::scopeBindings()->put('boards/{board}/tasks/{task}/move',  [TaskController::class, 'move']);
    Route::scopeBindings()->apiResource('boards.tasks',  TaskController::class);
    Route::post('auth/logout', [AuthController::class, 'logout']);
});
