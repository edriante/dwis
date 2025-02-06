<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Admin Dashboard</span>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Welcome, Admin!</h2>
        <p>Use the navigation to manage categories, users, and settings.</p>
    </div>
</body>
</html>
