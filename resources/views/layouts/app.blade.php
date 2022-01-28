<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('css')
    <style>
        .p-btn{
            padding:0px 11px 0px 10px
        }
        .w-100{
            width: 100%
        }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        <div class="row">
            <div class="col s1">
            </div>
            <div class="col s10">
                <div class="section">
                    @yield('content')
                </div>
            </div>
            <div class="col s1">
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".button-collapse").sideNav();
            @if (session('status'))
            Materialize.toast('{{ session('status') }}',10000);
            @endif
            @foreach($errors->all() as $error)
            Materialize.toast('{{$error}}',4000);
            @endforeach
        })
    </script>
    @yield('js')
</body>
</html>
