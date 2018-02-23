@extends('admin.layouts.app')

@section('title', 'Codes')


@section('navbar-brand')
    <a class="navbar-brand" href="#">Edit Actor</a>
@endsection

@section('_actors_active', 'active')

@section('body')
    <div class="content">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(Session::has('success'))
            <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
        @endif
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{ $actor->actor_name }}</h4>
                </div>
                <div class="content">
                    <form action="{{ route('_update_actor', [ 'id' => $actor->id ]) }}" method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Actor Name</label>
                                    <input type="text" name="actor_name"
                                           class="form-control border-input" value="{{ $actor->actor_name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Actor Picture</label>
                                    <input type="file" name="actor_picture" class="form-control border-input">
                                </div>
                            </div>
                        </div>
                        <div class="pull-left">
                            <button type="submit" name="save" class="btn btn-success btn-fill btn-wd">Save</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
