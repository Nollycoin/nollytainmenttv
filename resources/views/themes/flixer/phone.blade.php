@extends('themes.flixer.layout.app')

@section('title', 'Phone')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" onclick="hideSearch();">
        <div class="row">
            <div class="col-lg-12">
                <div class="setting-container">
                    <div class="col-lg-7">
                        <h1>Change Phone</h1>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="" method="post">
                            <div class="form-group">
                                <label class="first">Mobile Phone Number</label>
                                <div class="clearfix"></div>
                                {{ Auth::user()->phone }}
                            </div>

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>New Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control input-dark">
                                <input type="hidden" id="phone_country_code" name="phone_country_code">
                            </div>
                            @if(isset($success))
                                <div class="alert alert-success">{{ $success }}</div>
                            @endif
                            <button type="submit"
                                    class="btn btn-danger btn-fill">Save
                            </button>
                            <a href="{{ route('settings') }}" class="btn btn-default btn-fill">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection