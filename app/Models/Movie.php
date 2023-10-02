<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Movie extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'release_year',
        'rate',
        'description',
        'genre_id'
    ];

    public function actors()
    {
        return $this->belongsToMany(ActorDirector::class, 'movie_actor_director', 'movie_id', 'actor_director_id')
            ->wherePivot('role', 'actor')
            ->withPivot('role');
    }

    public function directors()
    {
        return $this->belongsToMany(ActorDirector::class, 'movie_actor_director', 'movie_id', 'actor_director_id')
            ->wherePivot('role', 'director')
            ->withPivot('role');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie', 'movie_id', 'genre_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_movie')
            ->withTimestamps();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

}
