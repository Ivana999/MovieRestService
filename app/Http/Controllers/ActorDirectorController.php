<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ActorDirectorResource;
use App\Models\ActorDirector;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ActorDirectorController extends Controller
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $person = ActorDirector::all();

        return ActorDirectorResource::collection($person);
    }
}
