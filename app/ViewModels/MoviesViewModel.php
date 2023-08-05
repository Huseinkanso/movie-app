<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $genres;
    public $nowPlayingMovies;
    public function __construct($popularMovies,$nowPlayingMovies,$genres)
    {
        $this->popularMovies=$popularMovies;
        $this->nowPlayingMovies=$nowPlayingMovies;
        $this->genres=$genres;
    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }
    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }
    public function genres()
    {
        // take the genre (collect return collection of data)
        // the genreArray contain 2 key id and value so we return collection having key value of id and value value of genrevalue
        return  collect( $this->genres)->mapWithKeys(function ($genre){
            return [ $genre['id']=>$genre['name'] ];

        });


    }

    private function formatMovies($movie)
    {

        return collect($movie)->map(function ($movie){

            $genresFormated=collect($movie['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path'=>'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'],
                'vote_average'=>$movie['vote_average'] * 10 . '%',
                'release_date'=> \Carbon\Carbon::parse($movie['release_date'])->format('M d , Y'),
                'genres' => $genresFormated
            ])->only([
                'poster_path',
                'vote_average',
                'release_date',
                'genres',
                'id',
                'genre_ids',
                'title',
                'overview'
            ]);
        });
    }
}
