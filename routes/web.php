<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TaskController::class, 'index']);

Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('task/create', [TaskController::class, 'create']);
    Route::post('task', [TaskController::class, 'store']);
    Route::get('task/{task}/edit', [TaskController::class, 'edit']);
    Route::patch('task/{task}', [TaskController::class, 'update']);
    Route::delete('task/{task}', [TaskController::class, 'destroy']);
});
