<?php

namespace App\Http\Controllers;

use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(TaskRepository $taskRepository, UserRepository $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->findAll();

        return view('task.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $users = $this->userRepository->findAll();

        return view('task.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $task = $this->taskRepository->save($data);
        return redirect()->back()->with('message', 'Saved Successfully');
    }

    public function edit($id)
    {
        $task = $this->taskRepository->find($id);
        $users = $this->userRepository->findAll();

        return view('task.edit', ['task' => $task, 'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $task = $this->taskRepository->update($id, $data);

        return redirect()->back()->with('message', 'Updated Successfully');
    }

    public function delete($id)
    {
        $this->taskRepository->delete($id);
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
}
