<?php

namespace App\Repositories;

use App\Interfaces\TasksRepositoryInterface;
use App\Models\Tasks;

class TasksRepository implements TasksRepositoryInterface
{
    public function getList()
    {
        return Tasks::all();
    }

    public function getById($id)
    {
        return Tasks::findOrFail($id);
    }

    public function delete($id)
    {
        return Tasks::destroy($id);
    }

    public function create(array $details)
    {
        return Tasks::create($details);
    }

    public function update($id, array $details)
    {
        return Tasks::whereId($id)->update($details);
    }
}
