<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link rel="icon" href="../assets/img/download (2).png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>"> <!-- Link to the same CSS file -->
</head>
<body>
    <div class="login-container">
        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Profile" class="profile-img"> <!-- Use base_url for the logo -->
        <h3>ADMIN REGISTER</h3>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
        <?php endif; ?>
        <form action="<?= base_url('auth/register_process') ?>" method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="forgot-link">
            <p class="text-center mt-3">Already have an account? <a href="<?= base_url('auth/login') ?>">Login</a></p>
        </div>
    </div>
</body>
</html>