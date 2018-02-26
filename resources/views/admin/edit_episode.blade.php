@extends('admin.layouts.app')

@section('title', 'Edit Episode')


@section('navbar-brand')
    <a class="navbar-brand" href="#">Edit Episode</a>
@endsection

@section('_episodes_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{  $episode->episode_name }}</h4>
                </div>
                <div class="content">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ route('_update_episode', ['id' => $episode->id]) }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                {{ csrf_field() }}
                                <div class="panel panel-success">
                                    <div class="panel-heading panel-title">Video</div>
                                    <div class="panel-body">
                                        <select name="episode_id" class="form-control" required disabled>

                                            @foreach($movies as $movie)
                                                @if($movie->id == $episode->movie_id)
                                                    <option value="{{ $movie->id }}"
                                                            selected>{{ $movie->movie_name }}</option>
                                                @else
                                                    <option value="{{ $movie->id }}">
                                                        {{ $movie->movie_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Episode Name</div>
                                    <div class="panel-body"><input type="text" name="episode_name"
                                                                   class="form-control border-input"
                                                                   placeholder="Enter a name for this episode"
                                                                   value="{{  $episode->episode_name }}" required></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Episode Number</div>
                                    <div class="panel-body"><input type="text" name="episode_number"
                                                                   class="form-control border-input"
                                                                   placeholder="Enter a number for this episode"
                                                                   value="{{  $episode->episode_number }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Season Number</div>
                                    <div class="panel-body"><input type="text" name="season_number"
                                                                   class="form-control border-input"
                                                                   placeholder="What season does this episode belong to?"
                                                                   value="{{ $season->season_number }}" required></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Episode Description</div>
                                    <div class="panel-body"><textarea id="editor" name="episode_description" rows="5"
                                                                      class="form-control"
                                                                      placeholder="Enter a description/plot for this episode"
                                                                      required>{{  $episode->episode_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Episode Thumbnail</div>
                                    <div class="panel-body"><input type="file" name="episode_thumbnail"
                                                                   class="form-control border-input"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Episode Source</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label> Episode Format </label>
                                            <div class="clearfix"></div>
                                            <select id="video_format" name="video_format" class="form-control"
                                                    onchange="changeVideoFormat()">
                                                <option value="0" {{ ($episode->is_embed == 0 ? 'selected' : false) }}>
                                                    Video file
                                                </option>
                                                <option value="1" {{  ($episode->is_embed == 1 ? 'selected' : false) }}>
                                                    Embed code
                                                </option>
                                            </select>
                                            <br>
                                            <div id="video_file_div"  {{ ($episode->is_embed == 1 ? 'style="display:none;"' : false) }}>
                                                <div class="form-group">
                                                    <label> Video URL (MP4)</label>
                                                    <input type="text" name="video_file_mp4" class="form-control"
                                                           value="{{ $episode->episode_source }}">
                                                    <p class="help-block"><b class="text-danger"> <i
                                                                    class="fa fa-youtube-play"></i> YouTube </b> links
                                                        are supported </p>
                                                </div>
                                            </div>
                                            <div id="video_embed_div" {{ ($episode->is_embed == 0 ? 'style="display:none;"' : false) }}>
                                                <div class="form-group">
                                                    <label> Embed code </label>
                                                    <textarea name="video_embed_code"
                                                              class="form-control"> {{ $episode->episode_source }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="save" class="btn btn-success btn-fill btn-wd">Save</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection