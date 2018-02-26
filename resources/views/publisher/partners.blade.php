@extends('publisher.layouts.app')

@section('title', 'Partners')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Partners
        <a href="{{ route('_add_partner') }}" class="btn btn-success btn-fill btn-xs pull-left" style="margin-top:21px;">
            <i class="ti-plus"></i>
            Add Partner
        </a>
    </a>
@endsection

@section('__active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">

            @if(!empty($users))
                <table class="table table-responsive card">
                    <thead>
                    <th class="text-center"> Email</th>
                    <th class="text-center"> Name</th>
                    <th class="text-center"> Phone</th>
                    <th class="text-center"> Percentage %</th>
                    <th class="text-center"> Actions</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            @if($user->is_admin == 0 && $user->is_subscriber == 0)
                                <td class="text-center"> User</td>
                            @elseif($user->is_admin == 0 && $user->is_subscriber == 1)
                                <td class="text-center"> Subscriber</td>
                            @else
                                <td class="text-center"> Admin</td>
                            @endif
                            <td class="text-center">30</td>
                            <td class="text-center">
                                <a href="#" onclick="deleteUserNow('{{ $user->id }}')" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            {{--{{ $users->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}--}}
        </div>
    </div>
@endsection