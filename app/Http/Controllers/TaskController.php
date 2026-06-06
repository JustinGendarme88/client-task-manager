<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
}