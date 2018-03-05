<?php

namespace App\Http\Controllers;

use App\ActorRelation;
use App\Episode;
use App\Helpers\Constants;
use App\Movie;
use App\MyList;
use App\Rating;
use App\Season;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $movie->user_id = Auth::id();

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

    public function updateVideo(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $settings = Setting::find(1);
        $this->validate($request, [
            'video_name' => 'sometimes',
            'video_description' => 'sometimes',
            'video_categories' => 'sometimes',
            'video_format' => 'sometimes',
            'is_featured' => 'sometimes',
            'video_actors' => 'sometimes'
        ]);

        if ($request->has('is_kid_friendly')){
            if ($settings->kid_profiles == 0) {
                $movie->is_kid_friendly = 0;
            } else {
                $movie->is_kid_friendly = $request->get('is_kid_friendly');
            }
        }

        if($request->has('video_name'))
            $movie->movie_name = $request->get('video_name');

        if($request->has('video_description'))
            $movie->movie_plot = $request->get('video_description');

        if ($request->has('video_categories'))
            $movie->movie_genres = implode(',', $request->get('video_categories'));

        if($request->has('video_format') && ($request->has('video_embed_code')
                || $request->has('video_file_mp4'))){
            if ($request->video_format == 1) {
                $movie->movie_source = $request->get('video_embed_code');
            } else {
                $movie->movie_source = $request->get('video_file_mp4');
            }
        }

        if ($request->has('is_featured'))
            $movie->is_featured =  $request->get('is_featured');

        if ($request->has('free_to_watch'))
            $movie->free_to_watch = $request->get('free_to_watch');

        if ($request->hasFile('video_thumbnail') && isset($request->video_thumnail)){
            $videoThumbImage = $request->file('video_thumbnail');

            $videoThumbImageName = md5(mt_rand()) . $videoThumbImage->getClientOriginalName();
            unlink(public_path(Constants::getUploadDirectory().'masonry_images/'.$movie->movie_thumb_image));
            $videoThumbImage->move(public_path(Constants::getUploadDirectory() . '/masonry_images/'),
                $videoThumbImageName);
        }

        if ($request->hasFile('video_poster') && isset($request->video_poster)){
            $videoPosterImage = $request->file('video_poster');

            $videoPosterImageName = md5(mt_rand()) . $videoPosterImage->getClientOriginalName();

            unlink(public_path(Constants::getUploadDirectory().'/poster_images/'.$movie->movie_poster_image));

            $videoPosterImage->move(public_path(Constants::getUploadDirectory() . '/poster_images/'),
                $videoPosterImageName);

            $movie->movie_poster_image = $videoPosterImageName;

        }

        if ($request->has('video_actors')){
            ActorRelation::where('movie_id', $id)->delete();

            $actors = $request->get('video_actors');
            $movie_id = $movie->id;
            foreach ($actors as $actor => $actor_id) {
                $actorRelation = new ActorRelation();
                $actorRelation->movie_id = $movie_id;
                $actorRelation->actor_id = $actor_id;

                $actorRelation->save();
            }
        }

        $movie->update();

        return redirect(route('_edit_video', ['id'=>$movie->id]))->with('success', 'Video was edited successfully');
    }

    public
    function deleteVideo($id)
    {
        $video = Movie::findOrFail($id);

        //actor relations, episodes, my list, ratings , seasons
        ActorRelation::where('movie_id', $video->id)->delete();
        Episode::where('movie_id', $video->id)->delete();
        MyList::where('movie_id', $video->id)->delete();
        Rating::where('movie_id', $video->id)->delete();
        Season::where('movie_id', $video->id)->delete();

        $video->delete();

        return 'true';
    }


    public function setPlayerSource(Request $request, $id)
    {
        $is_series = $request->get('is_series');
        $is_embed = $request->get('is_embed');

        if($is_series == 0) {
            $movie = Movie::where('id', $id)->first();
            if ($movie != null){
                if ($is_embed == 0){
                   return json_encode($movie);
                }else{
                    return '<iframe width="100%" height="100%" 
                    src="'.$movie->movie_source.'" frameborder="0" 
                    scrolling="no" allowfullscreen=""></iframe>';
                }
            }
        } else {
            $season = Season::where('movie_id', $id)->first();

            if ($season != null){
                $episode = Episode::where('season_id', $season->id)->first();

                if ($episode != null){
                    $episode_index = $episode->episode_number;

                    if ($is_embed == 0){
                        $movie = Movie::where('id', $episode->movie_id)->first();

                        $series_poster = $movie->movie_poster_image;

                        $playlist = Episode::where('season_id', $episode->season_id)->orderBy('episode_number', 'ASC')->get();


                        return json_encode(array(
                            'episode_index' => $episode_index,
                            'playlist' => $playlist,
                            'series_poster_image' => $series_poster
                        ));
                    }

                    return '<iframe width="100%" height="100%" 
                            src="'.$episode->episode_source.'" frameborder="0" scrolling="no" allowfullscreen=""></iframe>';
                }
            }
        }

        return '';
    }
}
