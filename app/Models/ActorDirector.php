<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorDirector extends Model
{
    use HasFactory;

    protected $table = 'actors_directors';
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'description'
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor_director', 'actor_director_id', 'movie_id')
            ->withPivot('role');
    }
}
