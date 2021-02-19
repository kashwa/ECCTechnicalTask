<?php


namespace App\Repository;


use App\Models\Task;

class TaskRepository
{

    public function findAll()
    {
        return Task::with('user')->get();
    }

    public function find($id)
    {
        return Task::where('id', $id)->with('user')->first();
    }

    public function save($data)
    {
        return Task::create($data);
    }

    public function update($id, $data)
    {
        $task = $this->find($id);
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        return Task::destroy($id);
    }
}
