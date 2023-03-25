<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['domain' => env('APP_ROUTE')], function () {
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/follow', [FollowController::class, 'followUser'])->middleware('csrf');
    Route::post('/unfollow', [FollowController::class, 'unfollowUser'])->middleware('csrf');
    Route::post('/follower-search', [FollowController::class, 'searchFollowerByName'])->middleware('csrf');
});

