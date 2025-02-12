<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/download (2).png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- SIDEBAR -->
<section id="sidebar">
    <a href="<?= site_url('Main_controller/index'); ?>" class="brand">
        <img src="<?= base_url('assets/img/download (2).png'); ?>" alt="A">
        <span class="text">dmin</span>
    </a>
    <ul class="side-menu top">
        <li><a href="<?= site_url('Main_controller/index'); ?>"><i class="bi bi-house-door"></i> <span class="text">Dashboard</span></a></li>
        <li class="active"><a href="<?= site_url('Main_controller/manageUsers'); ?>"><i class="bi bi-people"></i> <span class="text">Manage Users</span></a></li>
        <li><a href="<?= site_url('Main_controller/addServices'); ?>"><i class="bi bi-plus-square"></i> <span class="text">Add Services</span></a></li>
        <li><a href="<?= site_url('Main_controller/manageServices'); ?>"><i class="bi bi-tools"></i> <span class="text">Manage Services</span></a></li>
        <li><a href="<?= site_url('Main_controller/manageCategories'); ?>"><i class="bi bi-tag"></i> <span class="text">Categories</span></a></li>
    </ul>
    <ul class="side-menu">
        <li><a id="logoutBtn" class="logout"><i class="bi bi-box-arrow-right"></i> <span class="text">Logout</span></a></li>
    </ul>
</section>

<!-- CONTENT -->
<section id="content">
    <nav>
        <i class="bi bi-list"></i>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification"></a>
        <a href="#" class="profile">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Profile">
        </a>
    </nav>

    <main>
        <h2 class="custom-dashboard-title">Edit User</h2>
        <div class="container mt-4">
        <form action="<?= site_url('Main_controller/updateUser/' . $user['id']); ?>" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">

                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Male" <?= ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?= ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?= ($user['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </main>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/script.js'); ?>"></script>
<script src="<?= base_url('assets/js/logout.js'); ?>"></script>

</body>
</html>
