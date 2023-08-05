<?php

namespace App\Http\Controllers;

use App\ViewModels\TvShowViewModel;
use App\ViewModels\TvViewModel;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function index()
    {
        // api use key or token to access it we use token here and we put our token in .env and we access it from config/services.php
        $popularTv= Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular')
        ->json()['results'];


        // dd($popularTv);

        // take genres (we take it like this because we have in the popular movie the id of genre so we need to compare the id to take the genre from here)
        $topRatedTv=Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated')
        ->json()['results'];
        // dd($genreArray);

        $genres=Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $viewModel=new TvViewModel($popularTv,$topRatedTv,$genres);
        return view('tv.index',$viewModel);
    }

    public function show($id)
    {
        // append_to_response is method in the api to join many request
        $tv=Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/tv/{$id}?append_to_response=credits,videos,images")
        ->json();

        $movieView=new TvShowViewModel($tv);
        return view('tv.show',$movieView);
    }
}
