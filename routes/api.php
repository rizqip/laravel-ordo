<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Controller\UsersController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/list-user', [UsersController::class, 'listUser']);
Route::post('/create-user', [UsersController::class, 'createUser']);
Route::get('/detail-user/{id}', [UsersController::class, 'detailUser']);
Route::put('/update-user/{id}', [UsersController::class, 'updateUser']);
Route::delete('/delete-user/{id}', [UsersController::class, 'deleteUser']);

Route::post('/login', [UsersController::class, 'loginUser']);
