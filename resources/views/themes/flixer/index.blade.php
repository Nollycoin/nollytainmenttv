@extends('themes.flixer.layout.app')

@section('title', 'Home')

@section('body')
    <div class="home-page-image"
         style="
                 background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
                 url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$featuredMovie->movie_poster_image }}');
                 background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
                 url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$featuredMovie->movie_poster_image }}');
                 background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
                 url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$featuredMovie->movie_poster_image }}');
                 background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
                 url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$featuredMovie->movie_poster_image }}');
                 background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
                 url('{{ \App\Helpers\Constants::getUploadDirectory().'/poster_images/'.$featuredMovie->movie_poster_image }}');
                 );">

        @include('themes.flixer.layout.nav')

        <div class="container animated fadeIn" onclick="hideSearch();">
            <div class="home-movie-info">

                @if(isset($featuredMovie))
                    <div class="title">
                        {{ $featuredMovie->movie_name }}
                    </div>
                    <div class="star-rating"></div>
                    <p class="plot">
                        {{ $featuredMovie->movie_plot }}
                    </p>
                    <a href="{{ route('view_video', ['id'=> $featuredMovie->id]) }}" class="btn btn-danger btn-fill"
                       style="margin-right:10px;">
                        <i class="ti-control-play"></i>
                        <span>Watch Now</span>
                    </a>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        {!!   \App\Helpers\Movie::createAddToListButton($featuredMovie->id) !!}
                    @endif
                    <input type="hidden" id="movie_id" value="{{ $featuredMovie->id }}">
                @endif
            </div>
        </div>
    </div>
    <div class="container animated fadeIn" onclick="hideSearch();">
        <div class="row">
            <div class="col-lg-12">

                @if(!empty($myLists) && isset($myLists))
                    <div class="home-section">
                        <h1>
                            <a href="{{ route('my_list') }}">
                                My_List
                                <i class="ti-angle-right"></i>
                            </a>
                        </h1>

                        <div class="movie-slider-1 owl-theme">

                            @foreach($myLists as $myList)
                                <div class="item">
                                    <a href="{{ route('view_video', ['id' => $myList->id]) }}">
                                        <img src="{{ \App\Helpers\Constants::getUploadDirectory() }}/masonry_images/{{ $myList->movie_thumb_image }}'">
                                        <div class="play">
                                            <i class="icon icon-play3"></i>
                                        </div>
                                    </a>
                                    <div class="title"> {{ $myList->movie_name }} </div>
                                </div>

                            @endforeach

                        </div>

                    </div>
                @endif
                @foreach($genres as $genre)
                    @if(count($genre->movies) > 0)
                        <div class="home-section">
                            <h1>
                                <a href="category/{{ $genre->id }}/{{ strtolower($genre->name) }}">
                                    {{ $genre->genre_name }}
                                    <i class="ti-angle-right"></i>
                                </a>
                            </h1>
                            <div class="movie-slider-1 owl-theme">
                                @foreach($genre->movies as $movie)
                                    <div class="item">
                                        <a href="{{ route('view_video', ['id'=> $movie->id]) }}">
                                            <img src="{{
                                                \App\Helpers\Constants::getUploadDirectory()
                                                 .'/masonry_images/'.$movie->movie_thumb_image
                                                 }}" alt="{{ $movie->movie_name }}"/>
                                            <div class="play">
                                                <i class="icon icon-play3"></i>
                                            </div>
                                        </a>
                                        <div class="title"> {{ $movie->movie_name }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection