@extends('admin.layouts.app')

@section('title', 'Pages')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Pages
        <a href="add_page.php" class="btn btn-success btn-fill btn-xs pull-left" style="margin-top:21px;">
            <i class="ti-plus"></i> Add Page
        </a>
    </a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            @if(!empty($pages))
                <table class="table table-responsive card">
                    <thead>
                    <th class="text-center"> Name</th>
                    <th class="text-center"> Actions</th>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td class="text-center">{{ $page->id }}</td>
                            <td class="text-center">{{ $page->page_name }}</td>
                            <td class="text-center">
                                <a href="edit_page.php?id={{ $page->id }}" class="btn btn-success">Edit</a>
                                <a href="delete_page.php?id={{ $page->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    {{ $pages->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
@endsection