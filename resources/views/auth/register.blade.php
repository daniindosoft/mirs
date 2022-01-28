@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col s12 m10 offset-m1">

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Register</span>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus>
                            <label for="name">Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
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
                        <div class="input-field col s12">
                            <input id="password_confirmation" name="password_confirmation" type="password" required>
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <input id="admin" name="admin"
                                   type="checkbox"/>
                            <label for="admin">Administrator</label>
                        </div>
                    </div>

                </div>
                <div class="card-action center-align">
                    <button type="submit" class="btn waves-effect">
                        Register
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
