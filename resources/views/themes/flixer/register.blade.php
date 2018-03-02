@extends('themes.flixer.layout.app')

@section('title', 'Register')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" onclick="hideSearch();">
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-5 centered pricing-page">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center">{{  $settings->subscription_name }}</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p class="lead" style="font-size:40px">
                                <strong>
                                    ${{ $settings->subscription_price }}
                                    <span>/Month</span>
                                </strong>
                            </p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Movies & Series
                            </li>
                            <li class="list-group-item"><i class="icon-ok text-danger"></i> Share your account with up
                                to 4
                                people
                            </li>
                            <li class="list-group-item"><i class="icon-ok text-danger"></i> Create a playlist with your
                                favorite movies
                            </li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-danger btn-block btn-fill" data-toggle="modal"
                               data-target="#pay">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content payment-modal">
                <div class="modal-body">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Sign Up
                                <div class="pull-right">
                                    <span>Secure Form</span>
                                    <img src="{{ asset('/themes/flixer/assets/images/padlock.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
<script>
    $('#register-btn').on('click', function(e){
        /*a bit of validation here*/
        e.preventDefault();
        $.post('/register', function (data) {
            console.log(data);
        })
    });
</script>
@endsection