<?php

namespace App\Interfaces;

interface TasksRepositoryInterface
{
    public function getList();

    public function getById($id);

    public function delete($id);

    public function create(array $details);

    public function update($id, array $details);
}
