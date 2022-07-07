<?php

namespace App\Repositories;

use App\Interfaces\TasksRepositoryInterface;
use App\Models\Tasks;

class TasksRepository implements TasksRepositoryInterface
{
    public function getAllTasks(): \Illuminate\Support\Collection
    {
        return Tasks::all();
    }

    public function getTaskById($taskId)
    {
        return Tasks::findOrFail($taskId);
    }

    public function deleteTask($taskId)
    {
        Tasks::destroy($taskId);
    }

    public function createTask(array $taskDetails)
    {
        return Tasks::create($taskDetails);
    }

    public function updateTask($taskId, array $newDetails)
    {
        return Tasks::whereId($taskId)->update($newDetails);
    }
}
