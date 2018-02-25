<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use App\Setting;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function saveGenre(Request $request)
    {
        $settings = Setting::where('id', 1)->first();

        $this->validate($request, [
            'category_name' => 'required|string',
            'is_kid_friendly' => 'required'
        ]);


        if ($settings->kid_profiles == 0) {
            $is_kid_friendly = 0;
        } else {
            $is_kid_friendly = $_POST['is_kid_friendly'];
        }

        $genre = new Genre();

        $genre->genre_name = $request->get('category_name');
        $genre->is_kid_friendly = $is_kid_friendly;

        $genre->save();


        return redirect(route('_categories'));
    }

    public function updateGenre(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $settings = Setting::findOrFail(1);

        if ($request->has('category_name'))
            $genre->genre_name = $request->get('category_name');

        if ($settings->kid_profiles == 0) {
            $genre->is_kid_friendly = 0;
        } else {
            if ($request->has('is_kid_friendly'))
                $genre->is_kid_friendly = $request->get('is_kid_friendly');
        }

        $genre->update();

        return redirect(route('_edit_genre', [ 'id' => $genre->id ]))->with('success', 'Category was successfully edited');
    }

    public function deleteGenre($id)
    {
        $genre = Genre::findOrFail($id);

        $genreMovies = Movie::where('movie_genres', 'LIKE', '%' . $genre->id . '%')
            ->orWhere('movie_genres', 'LIKE', $genre->id . '%')
            ->orWhere('movie_genres', 'LIKE', '%' . $genre->id)->get();

        if ($genreMovies != null){
            foreach ($genreMovies as $movie){
                $genres = explode(',', $movie->movie_genres);

                foreach ($genres as $key => $value){
                    if ($value == $id){
                        unset($genres[$key]);
                        $genres = array_values($genres);
                    }
                }

                $movie->movie_genres = implode(',', $genres);

                $movie->update();
            }
        }

        $genre->delete();

        return 'true';
    }
}
