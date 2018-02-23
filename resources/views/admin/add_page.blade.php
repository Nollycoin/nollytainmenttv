@extends('admin.layouts.app')

@section('title', 'Add Page')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Add Page</a>
@endsection

@section('_pages_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">Add New Page</h4>
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
                    <form action="{{ route('_save_page') }}" method="post">

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Page Name</label>
                                    <input type="text" name="page_name" class="form-control border-input"
                                           placeholder="Enter a name for this page" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Page Content</label>
                                    <textarea name="page_content" class="form-control"
                                              placeholder="Enter some content for this page" rows="5" cols="20" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-left">
                            <button type="submit" name="add" class="btn btn-success btn-fill btn-wd">Add Page</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection