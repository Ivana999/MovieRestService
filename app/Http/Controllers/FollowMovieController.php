<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use App\Http\Resources\MovieResource;
use App\Http\Requests\FollowMovieRequest;
use Illuminate\Http\JsonResponse;

class FollowMovieController extends Controller
{

    /**
     * Retrieve a list of movies followed by a user.
     *
     * @param User $user The user for whom to retrieve followed movies.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(User $user): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $movie = Movie::whereHas('followers', function ($query) {
            $query->where('user_id', request()->user()->id);
        })->get();
        return MovieResource::collection($movie);
    }


    /**
     * Follow one or more movies for a user.
     *
     * @param FollowMovieRequest $request The request containing the list of movie IDs to follow.
     *
     * @return JsonResponse
     */
    public function followMovies(FollowMovieRequest $request): JsonResponse
    {
        $request->user()->followedMovies()->sync($request->get('movies'));

        return response()->json(['message' => 'Movies followed successfully.']);
    }

    /**
     * Unfollow one or more movies for a user.
     *
     * @param FollowMovieRequest $request The request containing the list of movie IDs to unfollow.
     *
     * @return JsonResponse
     */
    public function unfollowMovies(FollowMovieRequest $request): JsonResponse
    {
        $request->user()->followedMovies()->detach($request->get('movies'));

        return response()->json(['message' => 'Movies unfollowed successfully.']);
    }
}
