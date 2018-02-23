<?php

namespace App\Http\Controllers;

use App\Genre;
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
}
