<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $topRatedTv;
    public $genres;
    public function __construct($popularTv,$topRatedTv,$genres)
    {
        $this->popularTv=$popularTv;
        $this->topRatedTv=$topRatedTv;
        $this->genres=$genres;
    }

    public function popularTv()
    {
        return $this->formatTv($this->popularTv);
    }
    public function topRatedTv()
    {
        return $this->formatTv($this->topRatedTv);
    }
    private function formatTv($tvshow)
    {

        return collect($tvshow)->map(function ($tvshow){

            $genresFormated=collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'poster_path'=>'https://image.tmdb.org/t/p/w500/'. $tvshow['poster_path'],
                'vote_average'=>$tvshow['vote_average'] * 10 . '%',
                'first_air_date'=> \Carbon\Carbon::parse($tvshow['first_air_date'])->format('M d , Y'),
                'genres' => $genresFormated
            ])->only([
                'poster_path',
                'vote_average',
                'first_air_date',
                'genres',
                'id',
                'genre_ids',
                'name',
                'overview'
            ]);
        });
    }
    public function genres()
    {
        // take the genre (collect return collection of data)
        // the genreArray contain 2 key id and value so we return collection having key value of id and value value of genrevalue
        return  collect( $this->genres)->mapWithKeys(function ($genre){
            return [ $genre['id']=>$genre['name'] ];

        });


    }
}
