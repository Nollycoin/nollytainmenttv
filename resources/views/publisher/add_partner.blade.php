@extends('publisher.layouts.app')

@section('title', 'Partners')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Add Partner
    </a>
@endsection

@section('__active', 'active')

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h4 class="title">Search User by email</h4>
                </div>
                <div class="content">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $key => $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('_find_new_partner') }}" method="get">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="email" class="form-control"
                                           value="{{ old('user_email') }}"
                                           name="user_email" placeholder="Search user by email...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(isset($userBasics))
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add New Partner</h4>
                    </div>
                    <div class="content">
                        <form action="{{ route('_save_new_partner') }}" method="post">

                            <input type="text" hidden="hidden" value="{{ $userBasics->id }}" name="user_id"/>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="user_name" disabled="disabled"
                                               class="form-control border-input"
                                               placeholder="Enter a name for this user"
                                               value="{{ $userBasics->name }}" required>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="user_email" disabled="disabled"
                                               class="form-control border-input"
                                               placeholder="Enter a email for this user"
                                               value="{{ $userBasics->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="video">Select a movie</label>
                                    <select name="video" onchange="getUnallocatedPercentage(this.value)" id="video" class="form-control chosen">
                                        @foreach($movies as $movie)
                                            <option value="{{ $movie->id }}">{{ $movie->movie_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(isset($templateMovie))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="text-center alert alert-info alert-bg">
                                            Unallocated Percentage for
                                            "<span id="movieName">{{ $templateMovie->movie_name }}</span>"
                                            -
                                            <span id="available_percentage">{{ $templateMovie->remainingShare }}</span>%
                                        </h4>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Percentage Share</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control"
                                               name="share" placeholder="Percentage of share"
                                               aria-describedby="basic-addon2">
                                        <span class="input-group-addon bg-info" id="basic-addon2"><b>%</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Wallet Address</label>
                                        <input type="text" name="wallet"
                                               class="form-control border-input"
                                               placeholder="Enter the wallet address for this user" required>
                                    </div>
                                </div>
                            </div>

                            <div class="pull-left">
                                <button type="submit" class="btn btn-success btn-fill btn-wd">Add Partner</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection




