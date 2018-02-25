<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Code;
use App\Episode;
use App\Genre;
use App\Movie;
use App\Page;
use App\Setting;
use App\User;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index()
    {
        $statistics = new \stdClass();

        $statistics->users = User::all()->count();
        $statistics->videos = Movie::all()->count();
        $statistics->episodes = Episode::all()->count();

        return view('admin.dashboard', [
            'statistics' => $statistics
        ]);
    }

    public function users()
    {
        $users = User::paginate(20);

        return view('admin.users', ['users' => $users]);
    }

    public function categories()
    {
        $genres = Genre::paginate(10);
        foreach ($genres as $genre) {
            $genreMovies = Movie::whereRaw("find_in_set('" . $genre->id . "', movie_genres)")->orderBy('id', 'desc')->get();
            $genre->movies = $genreMovies;
        }

        return view('admin.categories', ['genres' => $genres]);
    }

    public function editGenre($id)
    {
        $genre = Genre::findOrFail($id);

        return view('admin.edit_category', [
            'genre' => $genre,
            'settings' => Setting::findOrFail(1)
        ]);
    }

    public function videos(Request $request)
    {
        $videos = Movie::paginate(20);


        return view('admin.videos', ['movies' => $videos]);
    }

    public function episodes()
    {
        $episodes = Episode::paginate(20);

        return view('admin.episodes', ['episodes' => $episodes]);
    }

    public function actors()
    {
        $actors = Actor::paginate(20);

        return view('admin.actors', ['actors' => $actors]);
    }

    public function codes()
    {
        $codes = Code::paginate(20);
        return view('admin.codes', ['codes' => $codes]);
    }

    public function pages()
    {
        $pages = Page::paginate(15);
        return view('admin.pages', ['pages' => $pages]);
    }

    public function editPage($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.edit_page', ['page' => $page]);
    }

    public function themes()
    {
        $settings = Setting::where('id', 1)->first();

        $themes = scandir(public_path('/themes'));

        return view('admin.themes', [
            'settings' => $settings,
            'themes' => $themes
        ]);
    }

    public function settings()
    {
        $settings = Setting::where('id', 1)->first();

        return view('admin.settings', [
            'settings' => $settings
        ]);
    }

    public function addUser()
    {
        return view('admin.add_user');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', [
            'user' => $user
        ]);
    }

    public function addVideo()
    {
        $genres = Genre::all();
        $actors = Actor::all();
        $settings = Setting::where('id', 1)->first();


        return view('admin.add_video', [
            'genres' => $genres,
            'actors' => $actors,
            'settings' => $settings
        ]);
    }

    public function addActor()
    {
        return view('admin.add_actor');
    }

    public function editActor($id)
    {
        $actor = Actor::findOrFail($id);
        return view('admin.edit_actor', [
            'actor' => $actor
        ]);
    }

    public function addEpisode()
    {
        $movies = Movie::all();

        return view('admin.add_episode', [
            'movies' => $movies
        ]);
    }

    public function addGenre()
    {
        return view('admin.add_category', [
            'settings' => Setting::where('id', 1)->first()
        ]);
    }

    public function addPage()
    {
        return view('admin.add_page');
    }
}
