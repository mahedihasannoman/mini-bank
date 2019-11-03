@extends('layouts.login-master')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            {{config('app.name')}}
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register as a new user</p>

            <form method="post" action="{{route('register')}}">
                {{csrf_field()}}
                <div class="form-group has-feedback">
                    <input name="name" id="name" type="text" class="form-control" placeholder="Name"
                           value="{{old('first_name')}}" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <div class="form-group has-feedback">
                    <input name="email" id="name" type="email" class="form-control" placeholder="Email"
                           value="{{old('email')}}" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif


                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            </form>
            <a href="{{route('login')}}" class="text-center">I already have an account</a>
        </div>

    </div>
@endsection
