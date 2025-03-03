<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href= "<?= base_url('assets/img/download (2).png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dark.css'); ?>">
  
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
            <li class="active">
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
            <li>
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
			
			<form action="#">
				
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				
			</a>
			<a href="#" class="profile">
				<img src="../assets/img/logo.png" alt="Profile">
			</a>
		</nav>

        <main>
            <h2 class="custom-dashboard-title">Add New Service</h2>
            <div class="container mt-4">
            <form action="<?= site_url('Main_controller/addService'); ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="serviceName" class="form-label">Service Name:</label>
        <input type="text" class="form-control" id="serviceName" name="name" required>
    </div>
    <div class="mb-3">
        <label for="serviceDescription" class="form-label">Description:</label>
        <textarea class="form-control" id="serviceDescription" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="servicePrice" class="form-label">Price:</label>
        <textarea class="form-control" id="servicePrice" name="price" required></textarea>
    </div>
    <div class="mb-3">
        <label for="serviceImage" class="form-label">Image:</label>
        <input type="file" class="form-control" id="serviceImage" name="img" required>
    </div>
    <div class="mb-3">
        <label for="serviceStatus" class="form-label">Status:</label>
        <select class="form-control" id="serviceStatus" name="status" required>
            <option value="">Select Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="categoryId" class="form-label">Category Id:</label>
        <input type="text" class="form-control" id="categoryId" name="category_id" required></textarea>
    </div>
    <div class="mb-3">
        <label for="serviceCategory" class="form-label">Parent Category:</label>
        <select class="form-control" id="serviceCategories" name="category" required>
            <option value="">Set Parent Category</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Add Service</button>
</form>
            </div>
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