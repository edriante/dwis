<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/download (2).png">
    <link rel="stylesheet" href="../assets/css/manageusers.css"> <!-- Use the same CSS file for consistency -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <title>Manage Services</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <span class="text">AdminHub</span>
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
            <li class="active">
                <a href="<?= site_url('Main_controller/manageServices'); ?>">
                    <i class="bi bi-tools"></i>
                    <span class="text">Manage Services</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?= site_url('auth/logout'); ?>" class="logout">
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
                <!-- Search form can be added here if needed -->
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification"></a>
            <a href="#" class="profile">
                <img src="../assets/img/logo.png" alt="Profile">
            </a>
        </nav>

        <main>
            <h2 class="custom-dashboard-title">Manage Services</h2>
            <div class="search-container mb-3">
                <input type="text" placeholder="Search services..." id="serviceSearch" class="form-control" style="width: 300px; display: inline-block;">
                <button class="btn btn-primary">Search</button>
            </div>
            

                <table>
                    
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($services as $index => $service): ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= htmlspecialchars($service->name); ?></td>
                            <td><?= htmlspecialchars($service->description); ?></td>
                            <td>$<?= number_format($service->price, 2); ?></td>
                            <td>
                                <a href="<?= site_url('Main_controller/editService/' . $service->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('Main_controller/deleteService/' . $service->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?');">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
            <div class="d-flex justify-content-between align-items-center mb-3" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
                    
                <a href="<?= site_url('Main_controller/addServices'); ?>" class="btn btn-primary">Add New Service</a>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/manageusers.js"></script> <!-- Use the same JS file for consistency -->
</body>
</html>