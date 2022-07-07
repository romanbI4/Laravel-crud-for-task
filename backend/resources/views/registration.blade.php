@extends('layout')

@section('content')
    <div class="row">
        <h1 align="center">Registration</h1>

            {{ Form::open(array('url' => 'registration')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', Request::old('email'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Register', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
@endsection
