<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', ['tasks' => $tasks]);
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('task.show', ['task' => $task]);
    }

    public function create()
    {
        return view('task.index');
    }

    public function store(TaskRequest $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();
        return redirect('/tasks');
    }
    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', ['task' => $task]);
    }
    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);

        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();

        return redirect('/tasks');
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks');
    }
}
