<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'slug'=> $this->slug,
            'release_year'=> $this->release_year,
            'rate'=> $this->rate,
            'description'=> $this->description,
            'genre' => $this->whenLoaded('genres', function () {
                return GenreResource::collection($this->genres);
            }),
            'actor' => $this->whenLoaded('actors', function () {
                return ActorDirectorResource::collection($this->actors);
            }),
            'director' => $this->whenLoaded('directors', function() {
                return ActorDirectorResource::collection($this->directors);
            }),
        ];
    }
}
