<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href= "<?= base_url('assets/img/download (2).png'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/manageusers.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dark.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<title>Admin</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
    <a href="<?= site_url('Main_controller/index'); ?>" class="brand">
			<img src="../assets/img/download (2).png" alt="A">
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
    <a href="<?= site_url('Main_controller/addServices'); ?>">
        <i class="bi bi-plus-square"></i>
        <span class="text">Add Services</span>
    </a>
</li>

<li>
    <a href="<?= site_url('Main_controller/manageServices'); ?>">
        <i class="bi bi-tools"></i>
        <span class="text">Manage Services</span>
    </a>
</li>
<li class="active">
    <a href="<?= site_url('Main_controller/manageCategories'); ?>">
        <i class="bi bi-tag"></i>
        <span class="text">Categories</span>
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
            <a href="#" class="profile">
                <img src="../assets/img/logo.png" alt="Profile">
            </a>
        </nav>
		 <main>
            <h2 class="custom-dashboard-title">Categories</h2>
            <div class="search-container mb-3">
                <input type="text" placeholder="Search Category..." id="categorySearch" class="form-control" style="width: 300px; display: inline-block;">
                <button class="btn btn-primary">Search</button>
            </div>
            <table id="categoryTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= htmlspecialchars($category['cat_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlspecialchars($category['cat_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlspecialchars($category['img'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlspecialchars($category['slug'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlspecialchars($category['is_active'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <div class="action-icons">
                                <a href="<?= site_url('Main_controller/editCategory/' . $category['cat_id']); ?>" class="edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?= site_url('Main_controller/deleteCategory/' . $category['cat_id']); ?>" class="delete" onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No Results</td>
                </tr>
            <?php endif; ?>
        </tbody>
            </table>
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/logout.js'); ?>"></script>
    <script src="<?= base_url('assets/js/search.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dark.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>	
</body>
</html>