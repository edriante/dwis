<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/download (2).png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dark.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/modal.css'); ?>">
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
        <li><a href="<?= site_url('Main_controller/index'); ?>"><i class="bi bi-house-door"></i><span class="text">Dashboard</span></a></li>
            <li><a href="<?= site_url('Main_controller/manageUsers'); ?>"><i class="bi bi-people"></i><span class="text">Manage Users</span></a></li>
            <li class="active"><a href="<?= site_url('Main_controller/manageServices'); ?>"><i class="bi bi-tools"></i><span class="text">Manage Services</span></a></li>            
            <li><a href="<?= site_url('Main_controller/addServices'); ?>"><i class="bi bi-plus-square"></i><span class="text">Add Services</span></a></li>
            <li><a href="<?= site_url('Main_controller/manageCategories'); ?>"><i class="bi bi-tag"></i><span class="text">Categories</span></a></li>
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
            <a href="profile" class="profile">
            <img src="<?= !empty($img['img']) ? base_url('uploads/' . $img['img']) : base_url('assets/img/logo.png'); ?>" alt="Admin Profile">

                        </a>
        </nav>

        <main>
            <div class="edit-user-header">
                <h2 class="custom-dashboard-title">Edit Service</h2>
                <a href="<?= site_url('Main_controller/manageServices'); ?>" class="exit-button">
                    <i class="bi bi-x-circle"></i>
                </a>
            </div>
            <div class="container mt-4">
            <form action="<?= site_url('Main_controller/update_service/' . $service['id']); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $service['id']; ?>">

    <div class="mb-3">
        <label for="serviceName" class="form-label">Service Name:</label>
        <input type="text" class="form-control" id="serviceName" name="name" value="<?= $service['name']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="serviceDescription" class="form-label">Description:</label>
        <textarea class="form-control" id="serviceDescription" name="description" required><?= $service['description']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="servicePrice" class="form-label">Price:</label>
        <input type="text" class="form-control" id="servicePrice" name="price" value="<?= $service['price']; ?>" required>
    </div>

   
<div class="mb-3">
    <label for="editImage" class="form-label">Current Image:</label><br>
    <img src="<?= base_url('uploads/' . $service['img']); ?>" 
         alt="Service Image" 
         class="image-preview" 
         id="previewImage">
</div>


<div id="imageModal" class="modal">
    <span class="modal-close" onclick="closeModal()">&times;</span>
    <img id="modalImage">
    
   
</div>
<div class="mb-3">
        <label for="editImage" class="form-label">Upload New Image (Optional):</label>
        <input type="file" class="form-control" id="editImage" name="img">
    </div>

    <div class="mb-3">
        <label for="serviceStatus" class="form-label">Status:</label>
        <select class="form-control" id="serviceStatus" name="status" required>
            <option value="Active" <?= $service['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?= $service['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Service</button>
</form>

            </div>
        </main>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
    <script src="<?= base_url('assets/js/logout.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dark.js'); ?>"></script>
    <script src="<?= base_url('assets/js/modal.js'); ?>"></script>
</body>
</html>
