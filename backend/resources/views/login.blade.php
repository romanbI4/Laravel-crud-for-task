@extends('layout')

@section('content')
    <div class="row">
        <h1 align="center">Login</h1>

        {{ Form::open(array('url' => 'login')) }}

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', Request::old('email'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@endsection
