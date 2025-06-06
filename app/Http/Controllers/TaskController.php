<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('due_date') && !empty($request->due_date)) {
            $query->whereDate('due_date', $request->due_date);
        }

        $tasks = $query->orderBy('due_date', 'asc')->get();

        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'nullable|date',
            'status' => 'required|in:Not Started,Doing,Done',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'due_date', 'status']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tasks', 'public');
            $data['image'] = $path;
        }

        Task::create($data);

        return redirect('/')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'nullable|date',
            'status' => 'required|in:Not Started,Doing,Done',
            'image' => 'nullable|image|max:2048',
        ]);

        $task = Task::findOrFail($id);

        $data = $request->only(['title', 'description', 'due_date', 'status']);

        if ($request->hasFile('image')) {
            if ($task->image && Storage::disk('public')->exists($task->image)) {
                Storage::disk('public')->delete($task->image);
            }
            $path = $request->file('image')->store('tasks', 'public');
            $data['image'] = $path;
        }

        $task->update($data);

        return redirect('/')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if ($task->image && Storage::disk('public')->exists($task->image)) {
            Storage::disk('public')->delete($task->image);
        }

        $task->delete();

        return redirect('/')->with('success', 'Task deleted successfully!');
    }
}
