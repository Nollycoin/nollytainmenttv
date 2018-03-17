@extends('publisher.layouts.app')

@section('title', 'Partners')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Partners
        <a href="{{ route('_add_partner') }}" class="btn btn-success btn-fill btn-xs pull-left"
           style="margin-top:21px;">
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
                    <th class="text-center"> Movie Name</th>
                    <th class="text-center"> Percentage %</th>
                    <th class="text-center"> Actions</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->share_movie }}</td>
                            <td class="text-center">{{ $user->share }}%</td>
                            <td class="text-center">
                                <a href="#" onclick="deletePartner('{{ $user->id }}')" class="btn btn-danger">Remove</a>
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