@extends('admin.layouts.app')

@section('title', 'Codes')


@section('navbar-brand')
    <a class="navbar-brand" href="#">Edit Page</a>
@endsection

@section('_categories_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{ $genre->genre_name }}</h4>
                </div>
                <div class="content">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ route('_update_genre', ['id' => $genre->id ]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="category_name" class="form-control border-input"
                                           placeholder="Enter a new name for this category"
                                           value="{{ $genre->genre_name }}" required>
                                </div>
                            </div>
                        </div>
                        @if ($settings->kid_profiles == 1)
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Can be viewed by kids?</label>
                                        <select name="is_kid_friendly" class="form-control">
                                            <option value="0" {{ $genre->is_kid_friendly == 0 ? 'selected' : false }}> False
                                            </option>
                                            <option value="1"
                                                    {{ $genre->is_kid_friendly == 1 ? 'selected' : false }}> True
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
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