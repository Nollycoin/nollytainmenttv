@extends('publisher.layouts.app')

@section('title', 'Edit Videos')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Edit Video</a>
@endsection

@section('_videos_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{ $movie->movie_name }}</h4>
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
                    <form action="{{ route('_publisher_update_video', ['id'=> $movie->id]) }}" method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Name</div>
                                    <div class="panel-body"><input type="text" name="video_name"
                                                                   class="form-control border-input"
                                                                   placeholder="Enter a name for this video"
                                                                   value="{{ $movie->movie_name }}" required></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Description</div>
                                    <div class="panel-body">
                                        <textarea id="editor"
                                                  name="video_description" rows="5"
                                                  class="form-control"
                                                  placeholder="Enter a description/plot for this video"
                                                  required>{{ $movie->movie_plot }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Categories</div>
                                    <div class="panel-body">
                                        <select title="video genres" name="video_categories[]" multiple="multiple"
                                                class="form-control chosen">
                                            @foreach($genres as $genre)
                                                @if(preg_match('~\b'. (string)$genre->id .'\b~', $movie->movie_genres))
                                                    <option value="{{ $genre->id }}"
                                                            selected>{{ $genre->genre_name }}</option>
                                                @else
                                                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($settings->show_actors == 1)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-title">Video Actors</div>
                                        <div class="panel-body">
                                            <select title="video actors" name="video_actors[]" multiple="multiple"
                                                    class="form-control chosen">
                                                @foreach($actors as $actor)
                                                    @if($actor->is_in_cast == 1)
                                                        <option value="{{ $actor->id }}"
                                                                selected>{{ $actor->actor_name }}</option>
                                                    @else
                                                        <option value="{{ $actor->id }}">{{ $actor->actor_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Thumbnail</div>
                                    <div class="panel-body"><input type="file" name="video_thumbnail"
                                                                   class="form-control border-input"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Poster</div>
                                    <div class="panel-body"><input type="file" name="video_poster"
                                                                   class="form-control border-input"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Source</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label> Video Format </label>
                                            <div class="clearfix"></div>
                                            <select id="video_format" name="video_format" class="form-control"
                                                    onchange="changeVideoFormat()">
                                                <option value="0" {{ $movie->is_embed == 0 ? 'selected' : false }}>
                                                    Video file
                                                </option>
                                                <option value="1" {{ $movie->is_embed == 1 ? 'selected' : false }}>
                                                    Embed code
                                                </option>
                                            </select>
                                            <br>
                                            <div id="video_file_div" {{ $movie->is_embed == 1 ? 'style="display:none;' : false }}>
                                                <div class="form-group">
                                                    <label> Video URL (MP4)</label>
                                                    <input type="text" name="video_file_mp4" class="form-control"
                                                           value="{{ $movie->movie_source }}">
                                                    <p class="help-block"><b class="text-danger"> <i
                                                                    class="fa fa-youtube-play"></i> YouTube </b>
                                                        links are supported </p>
                                                </div>
                                            </div>
                                            <div id="video_embed_div"{{ $movie->is_embed == 0 ? 'style="display:none;' : false }}>
                                                <div class="form-group">
                                                    <label> Embed code </label>
                                                    <textarea name="video_embed_code"
                                                              class="form-control">{{ $movie->movie_source }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Status</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Featured</label>
                                            <select name="is_featured" class="form-control">
                                                <option value="1" {{ $movie->is_featured == 1 ? 'selected' : false }}>
                                                    True
                                                </option>
                                                <option value="0" {{ $movie->is_featured == 0 ? 'selected' : false }}>
                                                    False
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Who can watch?</label>
                                            <select name="free_to_watch" class="form-control">
                                                <option value="0" {{ $movie->free_to_watch == 0 ? 'selected' : false }}>
                                                    Only subscribers
                                                </option>
                                                <option value="1" {{ $movie->free_to_watch == 1 ? 'selected' : false }}>
                                                    Everyone
                                                </option>
                                            </select>
                                        </div>
                                        @if ($settings->kid_profiles == 1)
                                            <div class="form-group">
                                                <label>Child-Friendly</label>
                                                <select name="is_kid_friendly" class="form-control">
                                                    <option value="0"
                                                            {{  $movie->is_kid_friendly == 0 ? 'selected' : false }} ?>
                                                        False
                                                    </option>
                                                    <option value="1" {{  $movie->is_kid_friendly == 1 ? 'selected' : false }}>
                                                        True
                                                    </option>
                                                </select>
                                            </div>
                                        @endif
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