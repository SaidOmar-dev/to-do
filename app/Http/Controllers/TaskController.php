<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $tasks = auth()->user()->tasks;
            return view('tasksList.index', [
                'tasks' => $tasks
            ]);
        }
        return view('tasksList.index');
    }

    public function create()
    {
        return view('tasksList.create');
    }

    public function store()
    {
        if (auth()->user()) {
            $attributes = request()->validate([
                'description' => 'required'
            ]);

            $attributes['user_id'] = auth()->user()->id;

            Task::create($attributes);

            return redirect('/');
        }
        return redirect(route('login'));
    }

    public function edit(Task $task)
    {
        return view('tasksList.edit', [
            'task' => $task
        ]);
    }

    public function update(Task $task)
    {
        $attributes = request()->validate([
            'description' => 'required'
        ]);

        $task->update($attributes);

        return redirect('/')->with('success', 'Task Updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Task Deleted!');
    }
}
