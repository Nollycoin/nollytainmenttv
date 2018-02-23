@extends('themes.flixer.layout.app')

@section('title', $movie->movie_name)

@section('body')
    <div class="movie-page-image" style="
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$movie->movie_poster_image }}');
            background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$movie->movie_poster_image }}');
            background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$movie->movie_poster_image }}');
            background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$movie->movie_poster_image }}');
            background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$movie->movie_poster_image }}');
            );">

        @include('themes.flixer.layout.nav')

        <div class="player-single-outter container" onclick="hideSearch()">
            @if(\App\Helpers\Movie::canWatch($movie->free_to_watch))
                <div class="player-single-wrapper">
                    <div id="player"></div>
                </div>
            @else
                <div class="subscribe-alert text-center">
                    <h2>Available only to Subscribers</h2>
                    <a href="{{ url('/') }}/register.php" class="btn btn-default btn-fill btn-lg">
                        Subscribe now
                    </a>
                </div>
            @endif
        </div>
    </div>
    <div class="movie" onclick="hideSearch();">
        <div class="container" style="padding:0px;">
            <div class="col-lg-5 pull-left">
                <div class="main-info">
                    <h1 class="title">{{ $movie->movie_name }}</h1>
                    <div class="star-rating"></div>
                    <p class="plot">
                        {{ $movie->movie_plot }}
                    </p>
                </div>
            </div>
            <div class="col-lg-3 pull-right">
                <div class="action-buttons pull-right">
                    {{--<--?= $muviko->newAddListBtn($movie->id, 'red') ?>  TODO::SORT THIS LINK OUT--}}
                    <p class="about">
                        <b>Starring</b>
                        @for($i = 0; $i < count($actors); $i++)
                            {{ $actors[$i]->actor_name }}
                            @if($i < count($actors) - 1)
                                ,
                            @endif
                        @endfor
                    </p>
                    <p class="about">
                        <b>Genres :</b>
                        @for($i = 0; $i < count($movieGenres); $i++)
                            {{ $movieGenres[$i]->genre_name }}
                            @if($i < count($movieGenres) - 1)
                                ,
                            @endif
                        @endfor
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <ul class="tabs nav nav-pills nav-pills-danger">
                @if($movie->is_series == 1)
                    <li class="active">
                        <a href="#"
                           onclick="loadSeason('{{ $defaultSeason->id }}','{{ $defaultSeason->season_number }}'); return false;">
                            Episodes
                        </a>
                    </li>
                @endif
                @if($settings->show_actors == 1)
                    <li>
                        <a href="#" onclick="loadCast(); return false;">
                            Starring
                        </a>
                    </li>
                @endif
                <li>
                    <a href="#" onclick="loadSuggestions({{ $movie->id }}); return false;">
                        More Like This
                    </a>
                </li>
            </ul>
            <div class="dark-section">
                <div class="details-container">
                    <div class="row">
                        @if($movie->is_series == 1)
                            <div class="episodes">
                                <div class="season-picker">
                                    <span class="season-number">
                                      Season {{ $defaultSeason->season_number }}
                                    </span>
                                    <div class="dropdown">
                                        <button id="dLabel" type="button" class="season-dropdown btn btn-sm btn-simple"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="caret"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-actions dropdown-menu-right dropdown-small"
                                            aria-labelledby="dLabel">

                                            @foreach($seasons as $season)
                                                <li>
                                                    <a href="#" class="action-line"
                                                       onclick="loadSeason('{{ $season->id }}' , '{{ $season->season_number }}'); return false;">
                                                        Season {{ $defaultSeason->season_number }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="episodes-ajax"></div>
                            </div>
                        @endif

                        @if($settings->show_actors == 1)
                            <div class="cast" style="display:none;">
                                @foreach ($actors as $actor)
                                    <div class="actor">
                                        <img src="{{ \App\Helpers\Constants::getUploadDirectory() }}/actors/{{ $actor->actor_picture }}"
                                             class="img-responsive">
                                        <p class="title">{{ $actor->actor_name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="suggestions my-list" style="display:none;">
                            @if(!empty($suggestions))
                                @foreach($suggestions as $suggestion)
                                    @if($suggestion->id != $movie->id)
                                        <div class="item">
                                            <a href="{{ url('/') }}/video/{{ $suggestion->id }}">
                                                <img src="{{
                                            \App\Helpers\Constants::getUploadDirectory() }}/masonry_images/{{ $suggestion->movie_thumb_image }}">
                                                <div class="play">
                                                    <i class="icon icon-play3"></i>
                                                </div>
                                            </a>
                                            <div class="title">{{ $suggestion->movie_name }}</div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="movie_id" value="{{ $movie->id }}">
@endsection