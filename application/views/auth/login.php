<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="../assets/img/download (2).png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
</head>
<body>
    <div class="login-container">
        <img src="../assets/img/logo.png" alt="Profile" class="profile-img">
        <h3>ADMIN</h3>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
        <?php endif; ?>
        <form action="<?= base_url('auth/login_process') ?>" method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="forgot-link">
            <a href="#">Forgot Username / Password?</a>
        </div>
        <div class="create-account">
            Create new account → <a href="<?= site_url('auth/register'); ?>">Sign up here</a>
        </div>
    </div>
</body>
</html>
