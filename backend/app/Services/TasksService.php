<?php

namespace App\Services;

use App\Repositories\TasksRepository;

class TasksService
{
    private TasksRepository $tasksRepository;

    public function __construct(TasksRepository $tasksRepository)
    {
        $this->tasksRepository = $tasksRepository;
    }

    public function getList()
    {
        return $this->tasksRepository->getList();
    }

    public function getById($id)
    {
        return $this->tasksRepository->getById($id);
    }

    public function delete($id)
    {
        return $this->tasksRepository->delete($id);
    }

    public function create($request)
    {
        return $this->tasksRepository->create($request->only(['name', 'executor', 'provider', 'estimates', 'deadline']));
    }

    public function update($id, $request)
    {
        return $this->tasksRepository->update($id, $request->only(['name', 'executor', 'provider', 'estimates', 'deadline']));
    }
}
