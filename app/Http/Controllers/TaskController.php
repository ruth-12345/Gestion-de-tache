<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $tasks = empty($status) ? Task::all() : Task::where('status', $status)->get();

        $users = User::all(['id', 'name']);

        return view('task.index', compact('tasks', 'status', 'users'));
    }

    public function store(CreateTaskRequest $request):RedirectResponse
    {
        Task::create($request->validated());

        return redirect('/task')->with('message', 'Nouvelle tâche ajoutée!');
    }

    public function update(Task $task, UpdateTaskRequest $request): RedirectResponse
    {
        //dd($request->all());
        $task->update($request->validated());

        if($request->has('collaborators')) {
            $task->users()->sync($request->collaborators);
        }

        return redirect('/task')->with('message', 'Tâche modifiée!');
    }

    public function delete(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect('/task')->with('message', 'Tâche supprimée!');
    }
}
