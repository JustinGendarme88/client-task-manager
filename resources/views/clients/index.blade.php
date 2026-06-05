<!DOCTYPE html>
<html>
<head>
    <title>Client Task Manager</title>
</head>
<body>
    <h1>Client Task Manager</h1>

    <a href="{{ route('clients.create') }}">Add client</a>

    <ul>
        @foreach ($clients as $client)
            <li>
                <strong>{{ $client->name }}</strong>
                @if ($client->website)
                    - {{ $client->website }}
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>