@extends('layout')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@section('content')
    <div class="row">
        <h1 align="center">Tasks</h1>
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('tasks/create') }}">Create a task</a>
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </nav>
        @if (isset($tasks))
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Executor</th>
                    <th>Provider</th>
                    <th>Estimates (hours)</th>
                    <th>Deadline</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->executor }}</td>
                        <td>{{ $task->provider }}</td>
                        <td>{{ $task->estimates }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->updated_at }}</td>
                        <th>
                            <a href="{{ route('tasks.show', $task) }}" title="show">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-reply-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                                </svg>
                            </a>

                            <a href="{{ url("tasks/$task->id/edit") }}"title="edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                            {{ Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['tasks.destroy', $task->id]
                            ]) }}
                            {{ Form::button('
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>', [
                                    'class'=>'btn btn-danger',
                                    'type'=>'submit'
                                ]
                               )
                            }}
                            {{ Form::close() }}
                        </th>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @else
            <p>No tasks</p>
        @endif
    </div>
@endsection
