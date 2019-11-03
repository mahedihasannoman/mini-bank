@extends('layouts.login-master')
@section('content')
    <div class="login-box animated fadeIn">
        <div class="login-logo">
            <b>{{config('app.name')}}</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form method="post" action="{{route('login')}}">
                {{csrf_field()}}

                @if(Session::has('message'))
                    <div class="successMessage alert alert-{{Session::get('message_type')}} text-center">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email"
                           value="{{old('email')}}"
                           required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                @if($errors->has('email'))
                    <span class="help-block"><strong style="color: #f55247">{{$errors->first('email')}}</strong></span>
                @endif
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                @if($errors->has('password'))
                    <span class="help-block"><strong
                            style="color: #f55247">{{$errors->first('password')}}</strong></span>
                @endif
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck" style="left: 20px;">
                            <label>
                                <input type="checkbox" {{old('remember' ? 'checked':'')}}> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <a href="{{URL('/register')}}">Register</a><br>

        </div>
    </div>
@endsection
