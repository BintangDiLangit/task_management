<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('project_id') && $request->project_id != null) {
            $tasks = Task::where('project_id', $request->input('project_id'))->orderBy('priority')->get();
        } else {
            $tasks = Task::orderBy('priority')->get();
        }
        $projects = Project::all();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required'
        ]);

        Task::create([
            'task_name' => $request->input('task_name'),
            'priority' => $request->input('priority'),
            'project_id' => $request->input('project_id')
        ]);


        return redirect()->route('tasks.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required'
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'task_name' => $request->input('task_name'),
            'priority' => $request->input('priority'),
            'project_id' => $request->input('project_id')
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function updatePriorities(Request $request)
    {
        $taskOrder = $request->input('taskOrder');

        foreach ($taskOrder as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
