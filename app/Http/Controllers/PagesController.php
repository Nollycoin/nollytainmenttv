<?php

namespace App\Http\Controllers;

use App\ActorRelation;
use Session as LaravelSession;
use App\Episode;
use App\Genre;
use App\Movie;
use App\Page;
use App\Profile;
use App\Session;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    private $dataForPages = [];

    public function __construct(Request $request)
    {
        $genres = Genre::all();
        $pages = Page::orderBy('id', 'desc')->get();
        $settings = Setting::where('id', 1)->first();
        $statistics = new \stdClass();

        $statistics->users = User::all()->count();
        $statistics->videos = Movie::all()->count();
        $statistics->episodes = Episode::all()->count();

        foreach ($genres as $genre) {
            $genreMovies = Movie::whereRaw("find_in_set('" . $genre->id . "', movie_genres)")->orderBy('id', 'desc')->get();
            $genre->movies = $genreMovies;
        }

        $this->dataForPages['genres'] = $genres;
        $this->dataForPages['pages'] = $pages;
        $this->dataForPages['settings'] = $settings;
        $this->dataForPages['statistics'] = $statistics;

        LaravelSession::put([
            'theme_resource_path' => ($settings->theme == 'flixer') ? 'themes/flixer/' : 'themes/vixen/',
            'theme_views_path' => ($settings->theme == 'flixer') ? 'themes.flixer.' : 'themes.vixen.'
        ]);
    }

    public function index()
    {
        if (session()->has('isKid')) {
            $featuredMovie = Movie::where('is_featured', 1)->where('is_kid_friendly', 1)->inRandomOrder()->first();
        } else {
            $featuredMovie = Movie::where('is_featured', 1)->inRandomOrder()->first();
        }

        return view('themes.flixer.index', array_merge($this->dataForPages,
            [
                'featuredMovie' => $featuredMovie
            ]));
    }

    public function register()
    {
        return view('themes.flixer.register', array_merge($this->dataForPages, []));
    }

    public function video(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $actors = [];
        $movieGenres = [];
        $seasons = $movie->seasons;
        $defaultSeason = $movie->seasons()->first();

        $actorRelations = ActorRelation::where('movie_id', $movie->id)->with('actor')->get();
        foreach ($actorRelations as $actorRelation) {
            array_push($actors, $actorRelation->actor);
        }

        $movieGenresList = explode(',', $movie->movie_genres);
        foreach ($movieGenresList as $item) {
            $genre = Genre::where('id', $item)->first();
            if ($genre == null)
                continue;
            array_push($movieGenres, $genre);
        }

        $primaryGenre = $movieGenres[0]->id;

        $suggestions = Movie::where('movie_genres', 'LIKE', '%' . $primaryGenre . '%')
            ->orWhere('movie_genres', 'LIKE', $primaryGenre . '%')
            ->orWhere('movie_genres', 'LIKE', '%' . $primaryGenre)
            ->where('id', '!=', $movie->id)
            ->inRandomOrder()->limit(10)->get();

        return view('themes.flixer.video', array_merge($this->dataForPages, [
            'seasons' => $seasons,
            'defaultSeason' => $defaultSeason,
            'movie' => $movie,
            'actors' => $actors,
            'movieGenres' => $movieGenres,
            'suggestions' => $suggestions
        ]));
    }

    public function videos(Request $request)
    {
        $videos = [];

        if ($request->has('filter')) {
            if (strtolower($request->filter) == 'oldest') {
                $videos = Movie::orderBy('id', 'asc')->get();
            }

            if (strtolower($request->filter) == 'newest') {
                $videos = Movie::orderBy('id', 'desc')->get();
            }

            if (strtolower($request->filter) == 'random') {
                $videos = Movie::inRandomOrder()->get();
            }
        } else {
            $videos = Movie::all();
        }


        return view('themes.flixer.videos', array_merge($this->dataForPages, [
            'movies' => $videos
        ]));
    }

    public function accountActivity()
    {
        $sessions = Session::where('user_id', Auth::id())->get();

        return view('themes.flixer.account_activity', array_merge($this->dataForPages, [
            'sessions' => $sessions
        ]));
    }

    public function addProfile()
    {
        $profileAvatar = rand(1, 9);

        return view('themes.flixer.add_profile', array_merge($this->dataForPages, [
            'profileAvatar' => $profileAvatar
        ]));
    }

    public function category(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $genreMovies = [];

        if ($request->has('filter')) {
            if (strtolower($request->filter) == 'oldest') {
                $genreMovies = Movie::where('movie_genres', 'LIKE', '%' . $genre->id . '%')
                    ->orWhere('movie_genres', 'LIKE', $genre->id . '%')
                    ->orWhere('movie_genres', 'LIKE', '%' . $genre->id)
                    ->orderBy('id', 'asc')->get();
            }

            if (strtolower($request->filter) == 'newest') {
                $genreMovies = Movie::where('movie_genres', 'LIKE', '%' . $genre->id . '%')
                    ->orWhere('movie_genres', 'LIKE', $genre->id . '%')
                    ->orWhere('movie_genres', 'LIKE', '%' . $genre->id)
                    ->orderBy('id', 'desc')->get();
            }

            if (strtolower($request->filter) == 'random') {
                $genreMovies = Movie::where('movie_genres', 'LIKE', '%' . $genre->id . '%')
                    ->orWhere('movie_genres', 'LIKE', $genre->id . '%')
                    ->orWhere('movie_genres', 'LIKE', '%' . $genre->id)
                    ->inRandomOrder()->get();
            }
        } else {
            $genreMovies = Movie::where('movie_genres', 'LIKE', '%' . $genre->id . '%')
                ->orWhere('movie_genres', 'LIKE', $genre->id . '%')
                ->orWhere('movie_genres', 'LIKE', '%' . $genre->id)->get();
        }

        return view('themes.flixer.category', array_merge($this->dataForPages, [
            'genreMovies' => $genreMovies,
            'genre' => $genre
        ]));
    }

    public function changeEmail()
    {
        return view('themes.flixer.email', $this->dataForPages);
    }

    public function changeLanguage()
    {

        $languages = config('languages', ['English']);
        return view('themes.flixer.language', array_merge($this->dataForPages, [
            'languages' => $languages
        ]));
    }

    public function manageProfiles()
    {
        $profiles = Profile::where('user_id', Auth::id())->get();
        return view('themes.flixer.manage_profile', array_merge($this->dataForPages, [
            'profiles' => $profiles
        ]));
    }

    public function selectProfile(){
        $profiles = Profile::where('user_id', Auth::id())->get();
        return view('themes.flixer.select_profile', array_merge($this->dataForPages, [
            'profiles' => $profiles
        ]));
    }

    public function editProfile($id)
    {
        $profile = Profile::findOrFail($id); /*TODO:: make sure that this profile belongs to this user*/

        return view('themes.flixer.edit_profile', array_merge($this->dataForPages, [
            'profile' => $profile
        ]));
    }

    public function editPassword()
    {
        return view('themes.flixer.password', $this->dataForPages);
    }

    public function series(Request $request)
    {
        $series = [];

        if ($request->has('filter')) {
            if (strtolower($request->filter) == 'oldest') {
                $series = Movie::where('is_series', 1)
                    ->orderBy('id', 'asc')->get();
            }

            if (strtolower($request->filter) == 'newest') {
                $series = Movie::where('is_series', 1)
                    ->orderBy('id', 'desc')->get();
            }

            if (strtolower($request->filter) == 'random') {
                $series = Movie::where('is_series', 1)
                    ->inRandomOrder()->get();
            }
        } else {
            $series = Movie::where('is_series', 1)->get();
        }
        return view('themes.flixer.series', array_merge($this->dataForPages, [
            'series' => $series
        ]));
    }

    public function myList(){
        $myList = [];

        $list = null;//TODO:: Put a middle ware and uncomment out this line
        //s Auth::user()->myList()->where('profile_id', \session('profile_id', null))->get();

        if ($list != null){
            foreach ($list as $item) {
                $movie = Movie::where('id', $item->movie_id)->first();
                if ($movie != null)
                    array_push($myList, $movie);
            }
        }

        return view('themes.flixer.my_list', array_merge($this->dataForPages, [
            'myList' =>$myList
        ]));
    }

    public function page($id)
    {
        $page = Page::findOrFail($id);

        return view('themes.flixer.page', array_merge($this->dataForPages, [
            'page' => $page
        ]));
    }

    public function phone()
    {
        return view('themes.flixer.phone', array_merge($this->dataForPages));
    }

    public function settings(){

        $user = Auth::user();

        return view('themes.flixer.settings', array_merge($this->dataForPages, [
            'user' => $user
        ]));
    }

    public function search(Request $request){
        if (!$request->has('q')){
            return redirect()->back();
        }

        $query = $request->get('q');

        if (\session()->has('is_kid')){
            $movies = Movie::where('movie_name', 'like', '%'.$query.'%')->where('is_kid_friendly', '1')->get();
        }else{
            $movies = Movie::where('movie_name', 'like', '%'.$query.'%')->get();
        }


        return view('themes.flixer.search', array_merge($this->dataForPages, [
            'movies' => $movies,
            'query' => $query
        ]));
    }
}
