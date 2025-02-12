<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/download (2).png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="<?= site_url('Main_controller/index'); ?>" class="brand">
            <img src="<?= base_url('assets/img/download (2).png'); ?>" alt="A" class="profile-img">
            <span class="text">dmin</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
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
            <li>
                <a href="<?= site_url('Main_controller/manageCategories'); ?>">
                    <i class="bi bi-tag"></i>
                    <span class="text">Categories</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a id="logoutBtn" class="logout">
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

        <!-- MAIN -->
        <main>
            <h2 class="custom-dashboard-title">Dashboard</h2>
            <div class="custom-dashboard-cards">
    <div class="custom-card">
        <div class="custom-card-body">
            <div class="custom-card-icon bg-purple"><i class="bi bi-people"></i></div>
            <div class="custom-card-content">
                <h5>Users</h5>
                <h2><?php echo number_format($totalUsers); ?></h2>
                <p class="text-<?php echo ($usersToday > 0) ? 'success' : 'danger'; ?>">
    <?php echo ($usersToday > 0) ? '+' . $usersToday . ' users today' : '0 users today'; ?>
                </p>
            </div>
        </div>
    </div>
                <div class="custom-card">
                    <div class="custom-card-body">
                        <div class="custom-card-icon bg-red"><i class="bi bi-gear"></i></div>
                        <div class="custom-card-content">
                            <h5>Services</h5>
                            <h2><?php echo number_format($totalService); ?></h2>
                            <p class="text-<?php echo ($recentServices > 0) ? 'success' : 'danger'; ?>">
                              <?php echo ($recentServices > 0) ? '+' . $recentServices . ' services added this week' : '0 services added this week'; ?>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="custom-card">
                    <div class="custom-card-body">
                        <div class="custom-card-icon bg-green"><i class="bi bi-person-check"></i></div>
                        <div class="custom-card-content">
                            <h5>New Users</h5>
                            <h2>+3,462</h2>
                            <p class="text-danger">-2% since last quarter</p>
                        </div>
                    </div>
                </div>

                <div class="custom-card">
                    <div class="custom-card-body">
                        <div class="custom-card-icon bg-blue"><i class="bi bi-cart-check"></i></div>
                        <div class="custom-card-content">
                            <h5>Revenue</h5>
                            <h2>$103,430</h2>
                            <p class="text-success">+5% than last month</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chart-container d-flex justify-content-between">
                <div class="chart-box">
                    <h3>Services</h3>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="chart-box">
                    <h3>Users</h3>
                    <canvas id="mySecondChart"></canvas>
                </div>
            </div>
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/manageusers.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
    <script src="<?= base_url('assets/js/logout.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dark.js'); ?>"></script>

</body>
</html>