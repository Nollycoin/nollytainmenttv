@extends('themes.flixer.layout.app')

@section('title', 'Videos')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" onclick="hideSearch();">
        <div class="row">
            <div class="col-lg-12">
                <div class="my-list filter">
                    <h1>Videos</h1>
                    <div class="chosen-filter">
                        <select id="filter" class="form-control chosen" onchange="changeFilter()">
                            <option value="newest" {{ (request('filter')== 'newest') ? 'selected' : '' }}>
                                Newest
                            </option>
                            <option value="oldest" {{ (request('filter')== 'oldest') ? 'selected' : '' }}>
                                Oldest
                            </option>
                            <option value="random" {{ (request('filter')== 'random') ? 'selected' : '' }}>
                                Random
                            </option>
                        </select>
                    </div>
                    <div class="clearfix"></div>

                    @foreach($movies as $movie)
                        <div class="item">
                            <a href="{{ route('view_video', ['id' => $movie->id]) }}/videos/{{ $movie->id }}">
                                <img src="{{
                                \App\Helpers\Constants::getUploadDirectory() }}/masonry_images/{{ $movie->movie_thumb_image }}">
                                <div class="play">
                                    <i class="icon icon-play3"></i>
                                </div>
                            </a>
                            <div class="title"> {{ $movie->movie_name }} </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection