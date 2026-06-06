<!DOCTYPE html>
<html>
<head>
    <title>Client Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Client Task Manager</h1>
            <a class="btn btn-primary" href="{{ route('clients.create') }}">Add client</a>
        </div>

        @foreach ($clients as $client)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">{{ $client->name }}</h2>

                    @if ($client->website)
                        <p>
                            <a href="{{ $client->website }}" target="_blank">{{ $client->website }}</a>
                        </p>
                    @endif

                    <h4 class="mt-4">Tasks</h4>

                    @if ($client->tasks->isEmpty())
                        <p class="text-muted">No task yet.</p>
                    @else
                        <ul class="list-group mb-4">
                            @foreach ($client->tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong>{{ $task->title }}</strong>

                                        @if ($task->description)
                                            <div class="text-muted">{{ $task->description }}</div>
                                        @endif
                                    </div>

                                    <div class="d-flex gap-2 align-items-center">
                                        <form method="POST" action="{{ route('tasks.updateStatus', $task) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-primary" type="submit">
                                                {{ $task->status }}
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('tasks.store', $client) }}" class="row g-2">
                        @csrf

                        <div class="col-md-4">
                            <input class="form-control" type="text" name="title" placeholder="Task title">
                        </div>

                        <div class="col-md-6">
                            <input class="form-control" type="text" name="description" placeholder="Description">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-success w-100" type="submit">Add task</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>