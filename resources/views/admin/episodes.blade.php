@extends('admin.layouts.app')

@section('title', 'Episodes')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Episodes
        <a href="{{ route('_add_episode') }}" class="btn btn-success btn-fill btn-xs pull-left" style="margin-top:21px;">
            <i class="ti-plus"></i> Add Episode
        </a>
    </a>
@endsection

@section('_episodes_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">

            @if(!empty($episodes))
                @foreach($episodes as $episode)
                    <div class="video-card">

                        <div class="poster"
                             style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/episodes/{{ $episode->episode_thumbnail }}');
                                     background-image: -moz-linear-gradient(top,rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/episodes/{{ $episode->episode_thumbnail }}');
                                     background-image: -o-linear-gradient(top,rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/episodes/{{ $episode->episode_thumbnail }}');
                                     background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/episodes/{{ $episode->episode_thumbnail }}');
                                     background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/episodes/{{ $episode->episode_thumbnail }}')">
                        </div>
                        <div class="edit"><a href="{{ route('_edit_episode', ['id' => $episode->id]) }}"><i
                                        class="ti-pencil"></i></a></div>
                        <div class="delete"><a
                                    href="#" onclick="deleteEpisode('{{ $episode->id }}')"><i
                                        class="ti-trash"></i></a></div>
                        <div class="title">{{ $episode->episode_name }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{ $episodes->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
@endsection