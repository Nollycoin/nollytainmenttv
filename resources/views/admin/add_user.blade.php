@extends('admin.layouts.app')

@section('title', 'Add User')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Add User</a>
@endsection

@section('_users_active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">New User</h4>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="content">
                    <form action="{{ route('_save_user') }}" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="user_name"
                                           class="form-control border-input"
                                           placeholder="Enter a name for this user"
                                           value="{{ old('user_name') }}" required>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="user_email"
                                           class="form-control border-input"
                                           placeholder="Enter a email for this user"
                                           value="{{ old('user_email') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="user_password"
                                           class="form-control border-input"
                                           placeholder="Enter a password for this user" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" name="user_phone"
                                           class="form-control border-input"
                                           placeholder="Enter a phone for this user">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Rank</label>
                                    <select name="user_rank" class="form-control">
                                        <option value="0"> User </option>
                                        <option value="subscriber"> Subscriber </option>
                                        <option value="1"> Admin </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="pull-left">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Add User</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection