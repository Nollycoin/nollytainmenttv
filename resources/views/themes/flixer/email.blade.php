@extends('themes.flixer.layout.app')

@section('title', 'Email')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">
                <div class="setting-container">
                    <div class="col-lg-7">
                        <h1>Change Email</h1>
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
                        <form action="{{ route('change_email_post') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="first">Current Email</label>
                                <div class="clearfix"></div>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    {{ \Illuminate\Support\Facades\Auth::user()->email }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label>New Email</label>
                                <input type="email" required name="new_email" value="{{ old('new_email') }}"
                                       class="form-control input-dark">
                            </div>
                            <div class="form-group">
                                <label>Confirm Email</label>
                                <input type="email" required name="new_email_confirmation"
                                       value="{{ old('new_email_confirmation') }}" class="form-control input-dark">
                            </div>

                            @if(isset($success))
                                <div class="alert alert-success">{{ $success }}</div>
                            @endif

                            <button type="submit" name="save"
                                    class="btn btn-danger btn-fill">Save
                            </button>
                            <a href="{{ route('settings') }}"
                               class="btn btn-default btn-fill">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection