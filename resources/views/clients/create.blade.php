<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
</head>
<body>
    <h1>Add Client</h1>

    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Website</label>
            <input type="text" name="website">
        </div>

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('clients.index') }}">Back</a>
</body>
</html>