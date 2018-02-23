@extends('admin.layouts.app')

@section('title', 'Add Genre')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Add Genre</a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">New Category</h4>
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
                    <form action="{{ route('_save_genre') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="category_name" class="form-control border-input"
                                           placeholder="Enter a name for this category" required>
                                </div>
                            </div>
                        </div>
                        @if($settings->kid_profiles == 1)
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Can be viewed by kids?</label>
                                        <select name="is_kid_friendly" class="form-control">
                                            <option value="0"> False</option>
                                            <option value="1"> True</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="pull-left">
                            <button type="submit" name="add" class="btn btn-success btn-fill btn-wd">Add Category
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection