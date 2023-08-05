<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // api use key or token to access it we use token here and we put our token in .env and we access it from config/services.php
        $popularMovies= Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];


        // dd($popularMovies);

        // take genres (we take it like this because we have in the popular movie the id of genre so we need to compare the id to take the genre from here)
        $genreArray=Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];
        // dd($genreArray);
        $nowPlayingMovies=Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];

        // dd($nowPlayingMovies);

        // dd($popularMovies);
        // return view('index',[
        //     'popular_movies'=>$popularMovies,
        //     'genres'=>$genres,
        //     'now_playing_movies'=>$nowPlayingMovies
        // ]);

        // use of view model package to refactor the code and make it better

        $viewModel= new MoviesViewModel($popularMovies,$nowPlayingMovies,$genreArray);

        return view('movies.index',$viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // append_to_response is method in the api to join many request
        $detailsMovie=Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/movie/{$id}?append_to_response=credits,videos,images")
        ->json();

        $movieView=new MovieViewModel($detailsMovie);
        // dd($detailsMovie);
        return view('movies.show',$movieView);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
