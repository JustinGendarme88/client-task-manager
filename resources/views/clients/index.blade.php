<!DOCTYPE html>
<html>
<head>
    <title>Client Task Manager</title>
</head>
<body>
    <h1>Client Task Manager</h1>

    <a href="{{ route('clients.create') }}">Add client</a>

    @foreach ($clients as $client)
        <div style="margin-top: 30px;">
            <h2>{{ $client->name }}</h2>

            @if ($client->website)
                <p>{{ $client->website }}</p>
            @endif

            <h3>Tasks</h3>

            <ul>
                @foreach ($client->tasks as $task)
                    <li>
                        <strong>{{ $task->title }}</strong>
                        @if ($task->description)
                            - {{ $task->description }}
                        @endif
                        <em>({{ $task->status }})</em>
                    </li>
                @endforeach
            </ul>

            <form method="POST" action="{{ route('tasks.store', $client) }}">
                @csrf

                <div>
                    <label>Task title</label>
                    <input type="text" name="title">
                </div>

                <div>
                    <label>Description</label>
                    <input type="text" name="description">
                </div>

                <button type="submit">Add task</button>
            </form>
        </div>
    @endforeach
</body>
</html>