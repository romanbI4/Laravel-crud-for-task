@extends('layout')

@section('content')

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('tasks') }}">View All tasks</a></li>
    </ul>
</nav>

<h1>Create a task</h1>

{{ Form::open(['url' => 'tasks']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('executor', 'Executor') }}
        {{ Form::text('executor', Request::old('executor'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('provider', 'Provider') }}
        {{ Form::text('provider', Request::old('provider'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('estimates', 'Estimates (hours)') }}
        {{ Form::number('estimates', Request::old('estimates'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('deadline', 'Deadline') }}
        {{ Form::date('deadline', Request::old('deadline'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Create the task!', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@endsection
