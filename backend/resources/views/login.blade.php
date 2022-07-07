@extends('layout')

@section('content')
    <div class="row">
        <h1 align="center">Login</h1>
        <a href="{{ route('registration') }}">Register</a>
        {{ Form::open(['url' => 'login']) }}

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', Request::old('email'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
        </div>

        {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection
