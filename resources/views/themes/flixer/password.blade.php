@extends('themes.flixer.layout.app')

@section('title', 'Change Password')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">
                <div class="setting-container">
                    <div class="col-lg-7">
                        <h1>Change Password</h1>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
                        @endif
                        <form action="{{ route('save_password') }}" method="post">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="current_password" class="form-control input-dark">
                            </div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="new_password" class="form-control input-dark">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control input-dark">
                            </div>
                            @if(isset($success))
                                <div class="alert alert-success">{{ $success }}</div>
                            @endif
                            <button type="submit" name="save"
                                    class="btn btn-danger btn-fill">Save</button>
                            <a href="{{ route('settings') }}" class="btn btn-default btn-fill">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection