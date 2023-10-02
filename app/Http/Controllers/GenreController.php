<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GenreController extends Controller
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $genre = Genre::all();

        return GenreResource::collection($genre);
    }
}
