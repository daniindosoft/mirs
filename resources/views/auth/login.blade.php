@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m10 offset-m1">

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Login</span>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" required autofocus>
                                <label for="email">E-Mail</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <input id="remember" name="remember"
                                       type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-action center-align">
                        <button type="submit" class="btn waves-effect">
                            Login
                        </button>
                        &nbsp;
                        <a class="btn-flat waves-effect" href="{{ route('password.request') }}">
                            Forgot Your Password ?
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
