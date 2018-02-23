@extends('admin.layouts.app')

@section('title', 'Add Episode')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Add Episode</a>
@endsection

@section('_episodes_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">New Episode</h4>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading panel-title">Video</div>
                                    <div class="panel-body">
                                        <select name="video_id" class="form-control" required>

                                            @foreach($movies as $movie)
                                                <option value="{{ $movie->id }}">{{ $movie->movie_name }}</option>
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
                                                                   placeholder="Enter a name for this episode" required>
                                    </div>
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
                                                                   required></div>
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
                                                                   required></div>
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
                                                                      required></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-title">Episode Thumbnail</div>
                                    <div class="panel-body"><input type="file" name="episode_thumbnail"
                                                                   class="form-control border-input" required></div>
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
                        <button type="submit" name="add" class="btn btn-success btn-fill btn-wd">Add Episode</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection