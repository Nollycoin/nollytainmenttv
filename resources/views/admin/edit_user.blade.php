@extends('admin.layouts.app')

@section('title', 'Edit User')


@section('navbar-brand')
    <a class="navbar-brand" href="#">Edit User</a>
@endsection

@section('_users_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{ $user->name }}</h4>
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
                @endif
                <div class="content">
                    <form action="{{ route('_update_user', [ 'id' => $user->id ]) }}" method="post">
                        <div class="row">
                            {{  csrf_field() }}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="user_name" class="form-control border-input"
                                           placeholder="Enter a name for this user" value="{{ $user->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="user_email" class="form-control border-input"
                                           placeholder="Enter a email for this user" value="{{ $user->email }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>New Password (optional)</label>
                                    <input type="password" name="user_password" class="form-control border-input"
                                           placeholder="Enter a new password for this user">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" name="user_phone" class="form-control border-input"
                                           placeholder="Enter a new phone for this user"
                                           value="{{ $user->phone_country_code }}">
                                </div>
                            </div>
                        </div>

                       {{-- <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Rank</label>
                                    <select name="user_rank" class="form-control">
                                        <option value="0" {{ $user->is_subscriber == 0 ? 'selected' : false }}>
                                            User
                                        </option>
                                        <option value="subscriber" {{ $user->is_subscriber == 1 ? 'selected' : false }}>
                                            Subscriber
                                        </option>
                                        <option value="1" {{ $user->is_admin == 1 ? 'selected' : false }}>
                                            Admin
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>--}}

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