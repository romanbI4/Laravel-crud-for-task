<?php

namespace App\Http\Controllers;

use App\Interfaces\TasksRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private TasksRepositoryInterface $tasksRepository;

    public function __construct(TasksRepositoryInterface $tasksRepository)
    {
        $this->tasksRepository = $tasksRepository;
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function index()
    {
        return view('tasks.index', [
            'tasks' => $this->tasksRepository->getAllTasks()
        ]);
    }

    public function store(Request $request)
    {
        $taskDetails = $request->all();

        if ($this->tasksRepository->createTask($taskDetails)) {
            return redirect()
                ->route('tasks.index')
                ->with('message', 'Task added');
        }

    }

    public function show($id)
    {
        $taskId = $id;
        $task = $this->tasksRepository->getTaskById($taskId);

        return view('tasks.show', compact('task'));

    }

    public function update($id, Request $request)
    {
        $taskId = $id;
        $taskDetails = $request->only([
            'name',
            'executor',
            'provider',
            'estimates',
            'deadline'
        ]);

        if ($this->tasksRepository->updateTask($taskId, $taskDetails)) {
            return redirect()
                ->route('tasks.index')
                ->with('message', 'Tasks updated Successfully');
        }

    }

    public function edit($id)
    {
        $taskDetails = $this->tasksRepository->getTaskById($id);

        return view('tasks.edit', compact('taskDetails'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->tasksRepository->deleteTask($id);

        return redirect()
            ->route('tasks.index')
            ->with('message', 'Task deleted');
    }
}
