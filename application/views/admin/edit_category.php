<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/download (2).png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/manageusers.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dark.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <title>Edit Category</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="<?= site_url('Main_controller/index'); ?>" class="brand">
            <img src="<?= base_url('assets/img/download (2).png'); ?>" alt="A">
            <span class="text">dmin</span>
        </a>
        <ul class="side-menu top">
            <li><a href="<?= site_url('Main_controller/index'); ?>"><i class="bi bi-house-door"></i><span class="text">Dashboard</span></a></li>
            <li><a href="<?= site_url('Main_controller/manageUsers'); ?>"><i class="bi bi-people"></i><span class="text">Manage Users</span></a></li>
            <li><a href="<?= site_url('Main_controller/manageServices'); ?>"><i class="bi bi-tools"></i><span class="text">Manage Services</span></a></li>            
            <li><a href="<?= site_url('Main_controller/addServices'); ?>"><i class="bi bi-plus-square"></i><span class="text">Add Services</span></a></li>
            <li class="active"><a href="<?= site_url('Main_controller/manageCategories'); ?>"><i class="bi bi-tag"></i><span class="text">Categories</span></a></li>
            <li><a href="<?= site_url('Main_controller/addCategories'); ?>"><i class="bi bi-plus-square"></i><span class="text">Add Category</span></a></li>
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
            <a href="#" class="profile">
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Profile">
            </a>
        </nav>
        <main>
        <div class="edit-user-header">
            <h2 class="custom-dashboard-title">Edit Category</h2>
            <a href="<?= site_url('Main_controller/manageCategories'); ?>" class="exit-button">
                <i class="bi bi-x-circle"></i>
            </a>
        </div>
            <div class="container mt-4">
                <form action="<?= site_url('Main_controller/updateCategory/' . $category['cat_id']); ?>" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($category['cat_id'], ENT_QUOTES, 'UTF-8'); ?>">

                    <div class="mb-3">
                        <label for="cat_name" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?= htmlspecialchars($category['cat_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Image URL:</label>
                        <input type="text" class="form-control" id="img" name="img" value="<?= htmlspecialchars($category['img'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="<?= htmlspecialchars($category['slug'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="is_active" class="form-label">Status:</label>
                        <select class="form-control" id="is_active" name="is_active" required>
                            <option value="1" <?= ($category['is_active'] == 1) ? 'selected' : ''; ?>>Active</option>
                            <option value="0" <?= ($category['is_active'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/logout.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dark.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>