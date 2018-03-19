@extends('publisher.layouts.app')

@section('title', 'Add Actor')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Add Actor</a>
@endsection

@section('_actors_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">Find already existing actor</h4>
                </div>
                <div class="content">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                   <li> {{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                    <form action="{{ route('find_actor_by_name') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Actor Name</label>
                                    <input type="text" name="actor_name" value="{{ old('actor_name') }}"
                                           class="form-control border-input"
                                           placeholder="Actor Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="pull-left">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Find Existing
                                Actor
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            @if(Session::has('actors'))
                <div class="card">
                    <div class="header">
                        <h4 class="title">Search Results</h4>
                    </div>
                    <div class="content">
                        @foreach(Session::get('actors') as $actor)
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

                                @if(!$actor->belongsToUser)
                                    <div class="edit" title="Add this actor">
                                        <a href="{{ route('_edit_actor', ['id' => $actor->id]) }}">
                                            <i class="ti-plus"></i>
                                        </a>
                                    </div>
                                @endif
                                <div class="title">{{ \App\Helpers\Constants::trimNames($actor->actor_name) }}</div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="header">
                    <h4 class="title">New Actor</h4>
                </div>
                <div class="content">
                    @if($errors->any() &&  !$errors->has('actor'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $key => $error)
                                    @if($key != 'actor')
                                        <li>{{ $error }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('_save_actor') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Actor Name</label>
                                    <input type="text" name="actor_name" value="{{ old('actor_name') }}"
                                           class="form-control border-input"
                                           placeholder="Enter a name for Actor" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Actor Picture</label>
                                    <input type="file" value="{{ old('actor_picture') }}" name="actor_picture"
                                           class="form-control border-input" required>
                                </div>
                            </div>
                        </div>
                        <div class="pull-left">
                            <button type="submit" name="add" class="btn btn-success btn-fill btn-wd">Add Actor</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection