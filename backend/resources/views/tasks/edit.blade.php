@extends('layout')

@section('content')
    <h1>Edit a task</h1>

    {{
        Form::open([
              'method' => 'put',
              'url' => [
                  'tasks',
                  $taskDetails->id
              ]
        ])
    }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $taskDetails->name ?? '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('executor', 'Executor') }}
        {{ Form::text('executor', $taskDetails->executor ?? '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('provider', 'Provider') }}
        {{ Form::text('provider', $taskDetails->provider ?? '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('estimates', 'Estimates (hours)') }}
        {{ Form::number('estimates', $taskDetails->estimates  ?? '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('deadline', 'Deadline') }}
        {{ Form::date('deadline', $taskDetails->deadline  ?? '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    {{ Form::submit('Edit the task!', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@endsection
