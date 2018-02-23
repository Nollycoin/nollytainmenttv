@extends('admin.layouts.app')

@section('title', 'Actors')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Actors
        <a href="{{ route('_add_actor') }}" class="btn btn-success btn-fill btn-xs pull-left" style="margin-top:21px;">
            <i class="ti-plus"></i> Add actor
        </a>
    </a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            @if(!empty($actors))
                @foreach($actors as $actor)
                    <div class="actor-card">
                        <div class="poster"
                             style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/actors/{{$actor->actor_picture}}');
                                     background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/actors/{{$actor->actor_picture}}');
                                     background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/actors/{{$actor->actor_picture}}');
                                     background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/actors/{{$actor->actor_picture}}');
                                     background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                     url('{{ \App\Helpers\Constants::getUploadDirectory() }}/actors/{{$actor->actor_picture}}')">
                        </div>
                        <div class="edit"><a href="edit_actor.php?id={{ $actor->id }}"><i class="ti-pencil"></i></a>
                        </div>
                        <div class="delete"><a href="delete_actor.php?id={{ $actor->id }}"><i class="ti-trash"></i></a>
                        </div>
                        <div class="title">{{ \App\Helpers\Constants::trimNames($actor->actor_name) }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{ $actors->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
@endsection