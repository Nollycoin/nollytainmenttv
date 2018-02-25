@extends('admin.layouts.app')

@section('title', 'Codes')


@section('navbar-brand')
    <a class="navbar-brand" href="#">Edit Page</a>
@endsection

@section('_pages_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{ $page->page_name }}</h4>
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
                    <form action="{{ route('_update_page', ['id' => $page->id ]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Page Name</label>
                                    <input type="text" name="page_name" class="form-control border-input"
                                           placeholder="Enter a name for this page"
                                           value="{{ $page->page_name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Page Content</label>
                                    <textarea name="page_content" class="form-control"
                                              placeholder="Enter some content for this page"
                                              rows="20"  required>{{ $page->page_content }}</textarea>
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