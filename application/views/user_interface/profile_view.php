<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="<?= base_url('assets/img/download (2).png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dark.css'); ?>"> 
    <link rel="stylesheet" href="<?= base_url('assets/css/manageusers.css'); ?>">
    <title>Profile</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="<?= site_url('Main_controller/index'); ?>" class="brand">
            <img src="<?= base_url('assets/img/download (2).png'); ?>" alt="A" class="profile-img">
            <span class="text">dmin</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="<?= site_url('Main_controller/index'); ?>">
                    <i class="bi bi-house-door"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= site_url('Main_controller/manageUsers'); ?>">
                    <i class="bi bi-people"></i>
                    <span class="text">Manage Users</span>
                </a>
            </li>
            <li>
                <a href="<?= site_url('Main_controller/manageServices'); ?>">
                    <i class="bi bi-tools"></i>
                    <span class="text">Manage Services</span>
                </a>
            </li>
            <li >
                <a href="<?= site_url('Main_controller/addServices'); ?>">
                    <i class="bi bi-plus-square"></i>
                    <span class="text">Add Services</span>
                </a>
            </li>
            <li>
                <a href="<?= site_url('Main_controller/manageCategories'); ?>">
                    <i class="bi bi-tag"></i>
                    <span class="text">Categories</span>
                </a>
            </li>
            <li>
                <a href="<?= site_url('Main_controller/addCategories'); ?>">
                    <i class="bi bi-plus-square"></i>
                    <span class="text">Add Category</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
    <li>
        <a id="logoutBtn" class="logout" data-logout-url="<?= base_url('Auth/logout'); ?>">
            <i class="bi bi-box-arrow-right"></i>
            <span class="text">Logout</span>
        </a>
    </li>
</ul>
    </section>

    <!-- CONTENT -->
    <section id="content">
        <nav>
            <i class="bi bi-list"></i>
            <form action="#"></form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification"></a>
            <a href="profile" class="profile">
                <img src="<?= !empty($img['img']) ? base_url('uploads/' . $img['img']) : base_url('assets/img/logo.png'); ?>" alt="Admin Profile">
            </a>
        </nav>

        <!-- MAIN -->
        
        <main>
    <div class="edit-user-header">
        <h2 class="custom-dashboard-title">Profile</h2>
        <a href="<?= site_url('Main_controller'); ?>" class="exit-button">
            <i class="bi bi-x-circle"></i>
        </a>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-4">
                    <div class="text-center">
                        <!-- Clickable Profile Image -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                            <img src="<?= !empty($admin['img']) ? base_url('uploads/' . $admin['img']) : base_url('assets/img/logo.png'); ?>"
                                class="rounded-circle" width="150" style="cursor: pointer;">
                        </a>
                        <h4 class="mt-3"><?= isset($admin['username']) ? $admin['username'] : 'N/A'; ?></h4>
                        <p class="text-muted"><?= isset($admin['email']) ? $admin['email'] : 'No email provided'; ?></p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h5>Username:</h5>
                            <p><?= isset($admin['username']) ? $admin['username'] : 'N/A'; ?></p>
                        </div>
                        <div class="col-6">
                            <h5>Email:</h5>
                            <p><?= isset($admin['email']) ? $admin['email'] : 'N/A'; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5>Joined:</h5>
                            <p><?= isset($admin['created_at']) ? date("F d, Y", strtotime($admin['created_at'])) : 'N/A'; ?></p>
                        </div>
                        <div class="col-6">
                            <h5>Password:</h5>
                            <p>******** <!--<a href="<?= site_url('Main_controller/changePassword'); ?>">Change</a> --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Update Profile Picture Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('Main_controller/update_profile_picture'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="img" class="form-label">Choose a new profile picture:</label>
                    <input type="file" class="form-control" name="img" accept="image/*" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/logout.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dark.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>
