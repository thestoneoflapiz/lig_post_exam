<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController, PostController, CommentController
};

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("login", [AuthController::class, "login"]);
Route::post("register", [AuthController::class, "register"]);

Route::group(['middleware' => ['auth:api']], function() {
    // Posts
    Route::post("posts", [PostController::class, "store"]);
    Route::patch("posts/{id}", [PostController::class, "update"]);
});

// Post
Route::get("posts", [PostController::class, "list"]);
Route::get("posts/{id}", [PostController::class, "fetch"]);

// Comment
Route::get("posts/{id}/comments", [CommentController::class, "list"]);
Route::post("posts/{id}/comments", [CommentController::class, "store"]);
