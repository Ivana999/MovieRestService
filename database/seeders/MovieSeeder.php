<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\ActorDirector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $actor1 = ActorDirector::firstOrCreate([
            'first_name' => 'First Actor',
            'last_name' => 'Lastname Actor',
            'birth_date' => '2023-01-01',
            'description' => 'Biography'
        ]);

        $actor2 = ActorDirector::firstOrCreate([
            'first_name' => 'Second Actor',
            'last_name' => 'Lastname Actor',
            'birth_date' => '1981-03-01',
            'description' => 'Biography'
        ]);

        $director1 = ActorDirector::firstOrCreate([
            'first_name' => 'First Director',
            'last_name' => 'Lastname Director',
            'birth_date' => '1974-07-04',
            'description' => 'Biography'
        ]);

        $director2 = ActorDirector::firstOrCreate([
            'first_name' => 'Second Director',
            'last_name' => 'Lastname Director',
            'birth_date' => '1978-09-01',
            'description' => 'Biography'
        ]);
        

        $movie1 = Movie::firstOrCreate([
            'name' => 'Movie 1',
            'release_year' => '2023-04-01',
            'description' => 'Lorem ipsum...',
            'rate' => '7.1'
        ]);

        $movie2 = Movie::firstOrCreate([
            'name' => 'Movie 2',
            'release_year' => '2015-08-01',
            'description' => 'A military dog that helped American Marines in ...',
            'rate' => '8.1'
        ]);

        $movie3 = Movie::firstOrCreate([
            'name' => 'Movie 3',
            'release_year' => '2012-04-05',
            'description' => 'A family dog that  ...',
            'rate' => '6.3'
        ]);

        $adventure = Genre::firstOrCreate([
            'name' => 'Adventure'
        ]);
        $comedy = Genre::firstOrCreate([
            'name' => 'Comedy'
        ]);


        $movie1->genres()->attach([$adventure->id, $comedy->id]);
        $movie1->actors()->attach([$actor1->id, $actor2->id], ['role' => 'actor']);
        $movie1->directors()->attach([$director1->id], ['role' => 'director']);

        $movie2->genres()->attach([$adventure->id, $comedy->id]);
        $movie2->actors()->attach([$actor2->id, $actor1->id], ['role' => 'actor']);
        $movie2->directors()->attach([$director2->id], ['role' => 'director']);

        $movie3->genres()->attach([$adventure->id, $comedy->id]);
        $movie3->actors()->attach([$actor2->id, $actor1->id], ['role' => 'actor']);
        $movie3->directors()->attach([$director2->id], ['role' => 'director']);
    }
}
