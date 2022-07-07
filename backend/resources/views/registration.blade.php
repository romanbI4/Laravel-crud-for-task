@extends('layout')

@section('content')
    <div class="row">
        <h1 align="center">Registration</h1>
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        {{ Form::open(['url' => 'registration']) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', Request::old('email'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
        </div>

        {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection
