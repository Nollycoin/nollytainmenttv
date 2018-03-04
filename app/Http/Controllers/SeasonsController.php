<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Helpers\Constants;
use App\Season;

class SeasonsController extends Controller
{
    public function fetchSeasonData($id)
    {
        $html = '';
        $season = Season::where('id', $id)->first();

        if ($season != null){
            $episodes = Episode::where('season_id', $season->id)->orderBy('episode_number', 'ASC')->get();

            if ($episodes != null) {
                foreach ($episodes as $episode) {
                    $html .= '<div class="episode">
                    <a href="#" onclick="loadEpisode(' . $episode->id . ',' . $episode->is_embed . '); return false;">
                        <img src="' . Constants::getUploadDirectory() . '/episodes/' . $episode->episode_thumbnail . '">
                    </a>
                    <p class="title"> ' . $episode->episode_number . '. ' . $episode->episode_name . ' </p>
                    <p class="description"> ' . $episode->episode_description . ' </p>
                    </div>';
                }
            }
        }
        return $html;
    }
}