<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    VerifyEmailController,
    ChangePasswordController,
    UserController,
    LoginController,
    ForgotPasswordController,
    GenreController,
    SearchMovieController,
    ActorDirectorController,
    FollowMovieController
};

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/verify-email', VerifyEmailController::class);
    Route::post('/change-password', ChangePasswordController::class);
    Route::post('/resend-verification-token', [UserController::class, 'resendToken'])
            ->middleware('throttle:verification-code');
    Route::get('/genres', GenreController::class);
    Route::get('/actors-directors', ActorDirectorController::class);
    Route::get('/followed-movies', [FollowMovieController::class, 'index']);
    Route::put('/follow-movies', [FollowMovieController::class, 'followMovies']);
    Route::put('/unfollow-movies', [FollowMovieController::class, 'unfollowMovies']);
    Route::get('/search-movies', SearchMovieController::class);
        });

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', LoginController::class);
Route::post('/forgot-password', [ForgotPasswordController::class, 'store']);
Route::put('/reset-password/{token}', [ForgotPasswordController::class, 'update']);

