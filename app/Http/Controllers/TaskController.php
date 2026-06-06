<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, Client $client)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $client->tasks()->create($validated);

        return redirect()->route('clients.index');
    }

    public function updateStatus(Task $task)
    {
        $nextStatus = match ($task->status) {
            'todo' => 'in_progress',
            'in_progress' => 'done',
            default => 'todo',
        };

        $task->update([
            'status' => $nextStatus,
        ]);

        return redirect()->route('clients.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('clients.index');
    }
}