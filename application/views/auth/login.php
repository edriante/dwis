<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg p-4" style="width: 350px;">
        <h3 class="text-center">Admin Login</h3>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
        <?php endif; ?>
        <form action="<?= base_url('auth/login_process') ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p>Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a></p>
    </div>
</body>
</html>
