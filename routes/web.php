<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{any}', function () {
    return view('welcome');
})->where("any", ".*");

Route::post('/api/auth/register', [AuthController::class, 'register']);
Route::post('/api/auth/login', [AuthController::class, 'login']);

Route::post('/api/admin/add', [AdminController::class, 'add']);
Route::post('/api/admin/update/{id}', [AdminController::class, 'update']);
Route::post('/api/admin/delete/{id}', [AdminController::class, 'delete']);
Route::post('/api/admin/getAll', [AdminController::class, 'getAll']);
