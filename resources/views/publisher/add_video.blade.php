@extends('publisher.layouts.app')

@section('title', 'Add Video')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Add Video</a>
@endsection

@section('_videos_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">New Video</h4>
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
                    <form action="{{ route('_publisher_save_video') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Name</div>
                                    <div class="panel-body"><input type="text" name="video_name"
                                                                   class="form-control border-input"
                                                                   placeholder="Enter a name for this video" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Description</div>
                                    <div class="panel-body"><textarea id="editor" name="video_description" rows="5"
                                                                      class="form-control"
                                                                      placeholder="Enter a description/plot for this video"
                                                                      required></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Categories</div>
                                    <div class="panel-body">
                                        <select name="video_categories[]" multiple="multiple"
                                                class="form-control chosen">
                                            @foreach($genres as $genre)
                                                <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
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
                                            <select name="video_actors[]" multiple="multiple"
                                                    class="form-control chosen">
                                                @foreach($actors as $actor)
                                                    <option value="{{ $actor->id }}">{{ $actor->actor_name }}</option>
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
                                                                   class="form-control border-input" required></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Video Poster</div>
                                    <div class="panel-body"><input type="file" name="video_poster"
                                                                   class="form-control border-input" required></div>
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
                                                <option value="0"> Video file</option>
                                                <option value="1"> Embed code</option>
                                            </select>
                                            <br>
                                            <div id="video_file_div">
                                                <div class="form-group">
                                                    <label> Video URL (MP4)</label>
                                                    <input type="text" name="video_file_mp4" class="form-control">
                                                    <p class="help-block"><b class="text-danger"> <i
                                                                    class="fa fa-youtube-play"></i> YouTube </b> links
                                                        are supported </p>
                                                </div>
                                            </div>
                                            <div id="video_embed_div" style="display:none;">
                                                <div class="form-group">
                                                    <label> Embed code </label>
                                                    <textarea name="video_embed_code" class="form-control"></textarea>
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
                                            <label> Featured </label>
                                            <select name="is_featured" class="form-control">
                                                <option value="0"> True</option>
                                                <option value="1"> False</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label> Who can watch? </label>
                                            <select name="free_to_watch" class="form-control">
                                                <option value="0"> Only subscribers</option>
                                                <option value="1"> Everyone</option>
                                            </select>
                                        </div>
                                        @if($settings->kid_profiles == 1)
                                            <div class="form-group">
                                                <label>Can be viewed by kids?</label>
                                                <select name="is_kid_friendly" class="form-control">
                                                    <option value="0"> False</option>
                                                    <option value="1"> True</option>
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="add" class="btn btn-success btn-fill btn-wd">Add Video</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection