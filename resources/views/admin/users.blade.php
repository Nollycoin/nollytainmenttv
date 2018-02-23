@extends('admin.layouts.app')

@section('title', 'Users')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Users
        <a href="{{ route('_add_user') }}" class="btn btn-success btn-fill btn-xs pull-left" style="margin-top:21px;">
            <i class="ti-plus"></i>
            Add User
        </a>
    </a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">

            @if(!empty($users))
                <table class="table table-responsive card">
                    <thead>
                    <th class="text-center"> #</th>
                    <th class="text-center"> Email</th>
                    <th class="text-center"> Name</th>
                    <th class="text-center"> Rank</th>
                    <th class="text-center"> Actions</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            @if($user->is_admin == 0 && $user->is_subscriber == 0)
                                <td class="text-center"> User</td>
                            @elseif($user->is_admin == 0 && $user->is_subscriber == 1)
                                <td class="text-center"> Subscriber</td>
                            @else
                                <td class="text-center"> Admin</td>
                            @endif
                            <td class="text-center">
                                <a href="edit_user.php?id={{ $user->id }}" class="btn btn-success">Edit</a>
                                <a href="delete_user.php?id={{ $user->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            {{ $users->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
        </div>
    </div>
@endsection