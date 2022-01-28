@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="section">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Dashboard</span>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
