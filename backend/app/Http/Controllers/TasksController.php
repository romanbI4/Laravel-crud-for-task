<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TasksService;

class TasksController extends Controller
{
    private TasksService $tasksService;

    public function __construct(TasksService $tasksService)
    {
        $this->tasksService = $tasksService;
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function index()
    {
        $tasks = $this->tasksService->getList();

        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $createRequest)
    {
        if ($this->tasksService->create($createRequest)) {
            return redirect()
                ->route('tasks.index')
                ->with('message', 'Task added');
        }
    }

    public function show($id)
    {
        $task = $this->tasksService->getById($id);

        return view('tasks.show', compact('task'));
    }

    public function update($id, TaskRequest $editRequest)
    {
        if ($this->tasksService->update($id, $editRequest)) {
            return redirect()
                ->route('tasks.index')
                ->with('message', 'Tasks updated Successfully');
        }
    }

    public function edit($id)
    {
        $taskDetails = $this->tasksService->getById($id);

        return view('tasks.edit', compact('taskDetails'));
    }

    public function destroy($id)
    {
        if ($this->tasksService->delete($id)) {
            return redirect()
                ->route('tasks.index')
                ->with('message', 'Task deleted');
        }
    }
}
