<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Add Client</h1>

        <form method="POST" action="{{ route('clients.store') }}" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name">
            </div>

            <div class="mb-3">
                <label class="form-label">Website</label>
                <input class="form-control" type="text" name="website">
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
                <a class="btn btn-outline-secondary" href="{{ route('clients.index') }}">Back</a>
            </div>
        </form>
    </div>
</body>
</html>