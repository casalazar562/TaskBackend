<?php

use App\Http\Controllers\API\V1\Auth\LoginAPIController;
use App\Http\Controllers\Api\V1\CuentaController;
use App\Http\Controllers\Api\V1\PedidoController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\API\V1\User\UserAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * rutas cuenta
 */
Route::get('tasks', [TaskController::class, 'all'])->name('get.all.tasks');
Route::post('add-task', [TaskController::class, 'create'])->name('add.tasks');
Route::put('/{id}/update', [TaskController::class, 'update'])->name('update.tasks');
Route::delete('/{id}/delete', [TaskController::class, 'delete'])->name('delete.task');

Route::get('/list-user', [UserAPIController::class, 'getUsers'])->name('get.user');
Route::post('/create', [UserAPIController::class, 'createUser'])->name('add.user');

Route::post('/login', [LoginAPIController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function () {

    Route::post('/logout', [LoginAPIController::class, 'logout']);
});


