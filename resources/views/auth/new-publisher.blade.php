@extends('auth.blank')

@section('title', 'Register')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" onclick="hideSearch();">
        <div class="row">
            <div class="col-lg-12">
               {{-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif--}}
                <div class="col-md-6 col-md-offset-2 pricing-page">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center"> Become a Publisher</h3>
                        </div>
                        <div class="panel-body text-center">
                            <form method="POST" action="{{ route('save_publisher') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-right">Company
                                        Name</label>

                                    <div class="col-md-6">
                                        <input id="company_name" type="text"
                                               class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}"
                                               name="company_name" value="{{ old('company_name') }}" required>

                                        @if ($errors->has('company_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('company_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Role</label>

                                    <div class="col-md-6">
                                        <input id="role" type="text" class="form-control" name="role" value="Publisher"
                                               disabled="disabled" required>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" class="form-control"
                                               name="password_confirmation" required>
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

                <div class="col-md-4" style="padding-top: 100px">
                    <h3> Become a pulisher to <br></h3>
                    <ul>
                        <li>Publish Movies on Nollytv</li>
                        <li> Setup Distribution contracts for upto 5 partners to receive payments for movies.</li>
                        <li>
                            Keep track of all payments made to partners in a movie project.
                        </li>
                    </ul>
                    </p>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#register-btn').on('click', function (e) {
            /*a bit of validation here*/
            e.preventDefault();
            $.post('/register', function (data) {
                console.log(data);
            })
        });
    </script>
@endsection