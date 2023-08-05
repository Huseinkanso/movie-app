<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function the_main_page_shows_correct_info()
    {
        // if our api dosent work we can specifie data here to replace the data that will not come (put the data in foo)
        Http::fake([
            'https:api.moviedb.org/3/movie/popular'=> $this->fakePopularMovies(),
            'https://api.themoviedb.org/3/movie/now_playing'=> $this->fakeNowPlayingMovies(),
            'https://api.themoviedb.org/3/genre/movie/list'=> $this->fakeGenres(),
        ]);

        $response= $this->get(route('movies.index'));

        $response->assertSuccessful();

        $response->assertSee('Popullar Movies');
        $response->assertSee('now playing movies');
        $response->assertSee('genres');
    }

    public function the_movie_page_shows_the_correct_info()
    {
        Http::fake([
            // 'https:api.moviedb.org/3/movie/*'=>$this->fakeSingleMovie(),
        ]);

        $response=$this->get(route('movies.show',12345));
        $response->assertSee('fake jumanji');
        $response->assertSee('casting director');
        $response->assertSee('dwayni jonhnson');
        $response->assertSee('outred raghnarson');
    }

    public function the_search_dropDown_works_correct()
    {
        Http::fake([
            // 'https:api.moviedb.org/3/search/movie?query=jumanji'=>$this->fakeSearchMovies(),
        ]);

        Livewire::test('search-dropdown')
        ->assertDontSee('jumanji')
        ->set('search','jumanji')
        ->assertSee('jumanji');
    }
    private function fakePopularMovies()
    {
        return Http::response([
            [
                'results'=>[
                    "adult" => false,
                    "backdrop_path" => "/tCpMRsHlfR6CcqJYA3kJMS3YApt.jpg",
                    "genre_ids" => [
                        0 => 28,
                        1 => 53,
                        2 => 80,
                    ] ,
                    "id" => 1035806,
                    "original_language" => "en",
                    "original_title" => "Detective Knight: Independence",
                    "overview" => "Detective James Knight 's last-minute assignment to the Independence Day shift turns into a race to stop an unbalanced ambulance EMT from imperiling the city's  ▶",
                    "popularity" => 2321.607,
                    "poster_path" => "/jrPKVQGjc3YZXm07OYMriIB47HM.jpg",
                    "release_date" => "2023-01-20",
                    "title" => "Detective Knight: Independence",
                    "video" => false,
                    "vote_average" => 7,
                    "vote_count" => 27,
                ]
            ]
                    ]);
    }

    private function fakeNowPlayingMovies()
    {
        return Http::response([
            [
                'results'=>[
                    "adult" => false,
                    "backdrop_path" => "/tCpMRsHlfR6CcqJYA3kJMS3YApt.jpg",
                    "genre_ids" => [
                        0 => 28,
                        1 => 53,
                        2 => 80,
                    ] ,
                    "id" => 1035806,
                    "original_language" => "en",
                    "original_title" => "Detective Knight: Independence",
                    "overview" => "Detective James Knight 's last-minute assignment to the Independence Day shift turns into a race to stop an unbalanced ambulance EMT from imperiling the city's  ▶",
                    "popularity" => 2321.607,
                    "poster_path" => "/jrPKVQGjc3YZXm07OYMriIB47HM.jpg",
                    "release_date" => "2023-01-20",
                    "title" => "now playing fake movies",
                    "video" => false,
                    "vote_average" => 7,
                    "vote_count" => 27,
                ]
            ]
                    ]);
    }

    private function  fakeGenres()
    {
        return Http::response([
            'results'=>[
                [
                    "id" => 12,
                    "name" => "Adventure"
                ],
                [
                    "id" => 28,
                    "name" => "Action"
                ],
                [
                    "id" => 16,
                    "name" => "Animation"
                ],
                [
                    "id" => 80,
                    "name" => "Crime"
                ],
                [
                    "id" => 99,
                    "name" => "Documentary"
                ],
                [
                    "id" => 35,
                    "name" => "Comedy"
                ],
                [
                    "id" => 18,
                    "name" => "Drama"
                ],
                [
                    "id" => 10751,
                    "name" => "Family"
                ],
              [
                "id" => 14,
                "name" => "Fantasy"
              ],
              [
                "id" => 36,
                "name" => "History"
              ],
              [
                "id" => 27,
                "name" => "Horror"
              ],
              [
                "id" => 10402,
                "name" => "Music"
              ],
              [
                "id" => 9648,
                "name" => "Mystery"
              ],
              [
                "id" => 10749,
                "name" => "Romance"
              ],
              [
                "id" => 878,
                "name" => "Science Fiction"
              ],
            [
                "id" => 10770,
                "name" => "TV Movie"
            ],
            [
                "id" => 53,
                "name" => "Thriller"
            ],
            [
                "id" => 10752,
                "name" => "War"
            ],
            [
                "id" => 37,
                "name" => "Western"
            ]
            ]

            ]);
}


}
