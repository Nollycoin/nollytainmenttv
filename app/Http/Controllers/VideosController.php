<?php

namespace App\Http\Controllers;

use App\ActorRelation;
use App\Helpers\Constants;
use App\Movie;
use App\Setting;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function saveVideo(Request $request)
    {

        $settings = Setting::find(1);
        $this->validate($request, [
            'video_name' => 'required',
            'video_description' => 'required',
            'video_categories' => 'required',
            'video_format' => 'required',
            'is_featured' => 'required',
            'video_thumbnail' => 'required|image|max:10024',
            'video_poster' => 'required|image|max:10024',
            'video_actors' => 'required'
        ]);
        /*$db->query("INSERT INTO movies (movie_name,movie_plot,movie_genres,
movie_poster_image,movie_thumb_image,movie_plays,movie_source,is_embed,
is_featured,is_kid_friendly,free_to_watch)
     VALUES ('" . $video_name . "','" . $video_description . "','"
            . $video_categories . "','" . $new_file_name_2 . "','"
            . $new_file_name . "','0','" . $source . "','" . $video_format
            . "','" . $is_featured . "','" . $is_kid_friendly . "','" . $free_to_watch
            . "')");*/

        $movie = new Movie();
        $movie->movie_name = $request->get('video_name');
        $movie->movie_plot = $request->get('video_description');
        $movie->movie_genres = implode(',', $request->get('video_categories'));
        $movie->movie_plays = '0';
        $movie->movie_source = $request->get('video_file_mp4');
        $movie->movie_year = date('Y');
        $movie->is_series = 0;
        $movie->last_season = 1;

        $movie->is_embed = $request->get('video_format');
        $movie->is_featured = $request->get('is_featured');
        $movie->is_kid_friendly = ($settings->kid_profiles) ? 0 : $request->get('is_kid_friendly');

        $movie->free_to_watch = $request->get('free_to_watch');
        $videoThumbImage = $request->file('video_thumbnail');

        $videoThumbImageName = md5(mt_rand()) . $videoThumbImage->getClientOriginalName();

        $videoThumbImage->move(public_path(Constants::getUploadDirectory() . '/masonry_images/'),
            $videoThumbImageName);

        $videoPosterImage = $request->file('video_poster');

        $videoPosterImageName = md5(mt_rand()) . $videoPosterImage->getClientOriginalName();

        $videoPosterImage->move(public_path(Constants::getUploadDirectory() . '/poster_images/'),
            $videoPosterImageName);

        $movie->movie_poster_image = $videoPosterImageName;
        $movie->movie_thumb_image = $videoThumbImageName;

        $movie->save();

        $actors = $_POST['video_actors'] = $request->get('video_actors');
        $movie_id = $movie->id;
        foreach ($actors as $actor => $actor_id) {
            $actorRelation = new ActorRelation();
            $actorRelation->movie_id = $movie_id;
            $actorRelation->actor_id = $actor_id;

            $actorRelation->save();
        }


        return redirect(route('_videos'));
    }
}
