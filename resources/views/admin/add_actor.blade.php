@extends('admin.layouts.app')

@section('title', 'Add Actor')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Add Actor</a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">New Actor</h4>
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
                                    <input type="file" value="{{ old('actor_picture') }}" name="actor_picture" class="form-control border-input" required>
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