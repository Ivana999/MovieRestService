<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Http\Requests\SearchMovieRequest;
use App\Http\Services\SearchMovieService;

class SearchMovieController extends Controller
{
    public function __invoke(SearchMovieRequest $request)
    {
        $movies = SearchMovieService::searchMovies($request);

        if ($movies) {
            return MovieResource::collection($movies);
        } else {
            return response()->json(['message' => 'There is no movies for selected filters.'], 404);
        }
    }
}
