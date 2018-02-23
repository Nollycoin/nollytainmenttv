@extends('admin.layouts.app')

@section('title', 'Videos')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Videos
        <a href="{{ route('_add_video') }}" class="btn btn-success btn-fill btn-xs pull-left" style="margin-top:21px;">
            <i class="ti-plus"></i> Add Video
        </a>
    </a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            @if(!empty($movies))
                @foreach($movies as $movie)
                    <div class="video-card">
                        <div class="poster"
                             style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0),
                                     rgba(0, 0, 0, 0.8)),
                                     url('{{
                                      \App\Helpers\Constants::getUploadDirectory() }}/poster_images/{{ $movie->movie_poster_image }}');
                                     background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0),
                                     rgba(0, 0, 0, 0.8)), url('{{
                                      \App\Helpers\Constants::getUploadDirectory() }}/poster_images/{{ $movie->movie_poster_image }}');
                                     background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0),
                                     rgba(0, 0, 0, 0.8)), url('{{
                                      \App\Helpers\Constants::getUploadDirectory() }}/poster_images/{{ $movie->movie_poster_image }}');
                                     background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0),
                                     rgba(0, 0, 0, 0.8)), url('{{
                                      \App\Helpers\Constants::getUploadDirectory() }}/poster_images/{{ $movie->movie_poster_image }}');
                                     background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0),
                                     rgba(0, 0, 0, 0.8)), url('{{
                                      \App\Helpers\Constants::getUploadDirectory() }}/poster_images/{{ $movie->movie_poster_image }}')">
                        </div>
                        <div class="edit"><a href="edit_video.php?id={{ $movie->id }}"><i class="ti-pencil"></i></a>
                        </div>
                        <div class="delete"><a href="delete_video.php?id={{ $movie->id }}"><i
                                        class="ti-trash"></i></a></div>
                        <div class="title">{{ $movie->movie_name }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection