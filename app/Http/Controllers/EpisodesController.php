<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Helpers\Constants;
use App\Movie;
use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function saveEpisode(Request $request)
    {
        $this->validate($request, [
            'video_id' => 'required',
            'season_number' => 'required',
            'episode_name' => 'required',
            'episode_number' => 'required',
            'episode_description' => 'required',
            'video_format' => 'required',
            'episode_thumbnail' => 'required|image|max:10024'
        ]);

        $movie_id = $request->get('video_id');
        $movie = Movie::findORFail($movie_id);

        $episode = new Episode();
        if ($request->video_format == 1) {
            $episode->episode_source = $request->get('video_embed_code');
            $episode->is_embed = '1';
        } else {
            $episode->episode_source = $request->get('video_file_mp4');
            $episode->is_embed = '0';
        }

        $episodeThumbImage = $request->file('episode_thumbnail');

        $episodeThumbImageName = md5(mt_rand()) . $episodeThumbImage->getClientOriginalName();

        $episodeThumbImage->move(public_path(Constants::getUploadDirectory() . '/episodes/'),
            $episodeThumbImageName);


        $movie->is_series = '1';

        $movie->update();

        $season = Season::where('movie_id', $movie_id)->where('season_number', $request->get('season_number'))->first();

        if ($season != null) {
            $season_id = $season->id;
        } else {
            $seas = new Season();
            $seas->movie_id = $movie_id;
            $seas->season_number = $request->get('season_number');

            $seas->save();
            $season_id = $seas->id;
        }

        $episode->season_id = $season_id;
        $episode->movie_id = $movie_id;
        $episode->episode_number = $request->get('episode_number');
        $episode->episode_name = $request->get('episode_name');
        $episode->episode_description = $request->get('episode_description');
        $episode->episode_thumbnail = $episodeThumbImageName;


        $episode->save();

        return redirect(route('_episodes'));
    }

    public function deleteEpisode($id)
    {
        $episode = Episode::findOrFail($id);

        $episodeCount = Episode::where('season_id', $episode->season_id)->count();

        if ($episodeCount <= 1) {
            $episode->delete();
            Season::where('id', $episode->season_id)->delete();
        } else {
            $episode->delete();
        }
        return 'true';
    }

    public function updateEpisode(Request $request, $id)
    {
        $episode = Episode::findOrFail($id);
        $season = Season::findOrFail($episode->season_id);

        $this->validate($request, [
            'video_id' => 'sometimes',
            'season_number' => 'sometimes',
            'episode_name' => 'sometimes',
            'episode_number' => 'sometimes',
            'episode_description' => 'sometimes',
            'video_format' => 'sometimes',
            'episode_thumbnail' => 'sometimes|image|max:10024'
        ]);

        if ($request->has('episode_name'))
            $episode->episode_name = $request->get('episode_name');

        if ($request->has('episode_description'))
            $episode->episode_description = $request->get('episode_description');

        if ($request->has('episode_number'))
            $episode->episode_number = $request->get('episode_number');

        if ($request->has('episode_thumbnail')) {
            $episodeThumbImage = $request->file('episode_thumbnail');

            $episodeThumbImageName = md5(mt_rand()) . $episodeThumbImage->getClientOriginalName();

            unlink(public_path(Constants::getUploadDirectory()) . '/episodes/' . $episode->episode_thumbnail);
            $episodeThumbImage->move(public_path(Constants::getUploadDirectory() . '/episodes/'),
                $episodeThumbImageName);

            $episode->episode_thumbnail = $episodeThumbImageName;
        }

        if ($request->has('video_format')) {
            if ($request->get('video_format') == 1) {
                $episode->episode_source = $request->get('video_embed_code');
                $episode->is_embed = '1';
            } else {
                $episode->episode_source = $request->get('video_file_mp4');
                $episode->is_embed = '0';
            }
        }

        $episode->update();

        if ($request->has('season_number')){
            $season->season_number = $request->season_number;
            $season->update();
        }

        return redirect(route('_edit_episode', ['id' => $episode->id]))->with('success', 'Episode was updated successfully');

    }


    public function loadEpisode(Request $request, $id)
    {
        $episode = Episode::where('id', $id)->first();
        $is_embed = ($request->has('is_embed') ? $request->get('is_embed') : 1);

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

        return '';
    }
}
