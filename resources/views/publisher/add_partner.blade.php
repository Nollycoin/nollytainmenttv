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
                                @foreach($errors->all() as $error)
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
                        <form action="{{ route('_save_user') }}" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="user_name"
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
                                        <input type="email" name="user_email"
                                               class="form-control border-input"
                                               placeholder="Enter a email for this user"
                                               value="{{ $userBasics->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Percentage of share" aria-describedby="basic-addon2">
                                        <span class="input-group-addon bg-info" id="basic-addon2"><b>%</b></span>
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




