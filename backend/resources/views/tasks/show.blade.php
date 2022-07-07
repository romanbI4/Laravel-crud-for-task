@extends('layout')

@section('content')
    <div class="row">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('tasks') }}">View all tasks</a>
                    <a href="{{ URL::to('tasks/create') }}">Create a task</a>
                </li>
            </ul>
        </nav>

        <h1>Showing {{ $task->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $task->name }}</h2>
            <p>
                <strong>Executor:</strong> {{ $task->executor }} <br>
                <strong>Provider:</strong> {{ $task->provider }} <br>
                <strong>Estimates:</strong> {{ $task->estimates }} <br>
                <strong>Deadline:</strong> {{ $task->deadline }} <br>
            </p>
        </div>

    </div>
@endsection
