<?php

namespace App\Http\Services;

use App\Http\Requests\SearchMovieRequest;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;

class SearchMovieService
{
    public static function searchMovies(SearchMovieRequest $request)
    {
        $data = $request->validated();
        $movieQuery = Movie::with(['genres', 'actors', 'directors']);

        return $movieQuery
            ->when(isset($data['name']), function (Builder $query) use ($data) {
                return $query->where('name', $data['name']);
            })
            ->when(isset($data['release_year']), function (Builder $query) use ($data) {
                return $query->where('release_year', $data['release_year']);
            })
            ->when(isset($data['genre_id']), function (Builder $query) use ($data) {
                return $query->whereHas('genres', function (Builder $genres) use ($data) {
                    return $genres->where('genre_id', $data['genre_id']);
                });
            })
            ->when(isset($data['actor_id']), function (Builder $query) use ($data) {
                return $query->whereHas('actors', function (Builder $actors) use ($data) {
                    return $actors->where('actor_director_id', $data['actor_id']);
                });
            })
            ->when(isset($data['director_id']), function (Builder $query) use ($data) {
                return $query->whereHas('directors', function (Builder $directors) use ($data) {
                    return $directors->where('actor_director_id', $data['director_id']);
                });
            })
            ->when(isset($data['description']), function (Builder $query) use ($data) {
                return $query->where('description', $data['description']);
            })
            ->when(isset($data['rate']), function (Builder $query) use ($data) {
                return $query->where('rate', $data['rate']);
            })->get();
    }
}
