@extends('admin.layouts.app')

@section('title', 'Genres')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Categories
        <a href="{{ route('_add_genre') }}" class="btn btn-success btn-fill btn-xs pull-left" style="margin-top:21px;">
            <i class="ti-plus"></i> Add Category
        </a>
    </a>
@endsection

@section('_categories_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">

            @if(!empty($genres))
                <table class="table table-responsive card">
                    <thead>
                    <th class="text-center"> #</th>
                    <th class="text-center"> Category</th>
                    <th class="text-center"> Kid Friendly</th>
                    <th class="text-center"> Actions</th>
                    </thead>
                    <tbody>

                    @foreach($genres as $genre)
                        <tr>
                            <td class="text-center">{{ $genre->id }}</td>
                            <td class="text-center">{{ $genre->genre_name }}</td>
                            @if($genre->is_kid_friendly == 1)
                                <td class="text-center"><i class="ti-check"></i></td>
                            @else
                                <td class="text-center"><i class="ti-close"></i></td>
                            @endif

                            <td class="text-center">
                                <a href="edit_category.php?id={{ $genre->id }}" class="btn btn-success">Edit</a>
                                <a href="delete_category.php?id={{ $genre->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            {{ $genres->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
        </div>
    </div>
@endsection