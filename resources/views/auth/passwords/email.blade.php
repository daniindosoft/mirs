@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m10 offset-m1">

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Reset Password</span>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                            <label for="email">E-Mail Address</label>
                        </div>
                    </div>

                </div>
                <div class="card-action center-align">
                    <button type="submit" class="btn waves-effect">
                        Send Password Reset Link
                    </button>
                    &nbsp;
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
