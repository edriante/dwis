<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="./assets/img/download (2).png">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

	<title>Admin</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			
			<span class="text">AdminHub</span>
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
		<!-- NAVBAR -->
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
		
		<!-- MAIN -->
		<main>
		<h2 class="custom-dashboard-title">Dashboard</h2>
    <div class="custom-dashboard-cards">
        <div class="custom-card">
            <div class="custom-card-body">
                <div class="custom-card-icon bg-purple"><i class="bi bi-wallet2"></i></div>
                <div class="custom-card-content">
                    <h5>Users</h5>
                    <h2>$53,000</h2>
                    <p class="text-success">+55% since yesterday</p>
                </div>
            </div>
        </div>

        <div class="custom-card">
            <div class="custom-card-body">
                <div class="custom-card-icon bg-red"><i class="bi bi-people"></i></div>
                <div class="custom-card-content">
                    <h5>Services</h5>
                    <h2>2,300</h2>
                    <p class="text-success">+3% since last week</p>
                </div>
            </div>
        </div>

        <div class="custom-card">
            <div class="custom-card-body">
                <div class="custom-card-icon bg-green"><i class="bi bi-person-check"></i></div>
                <div class="custom-card-content">
                    <h5></h5>
                    <h2>+3,462</h2>
                    <p class="text-danger">-2% since last quarter</p>
                </div>
            </div>
        </div>

        <div class="custom-card">
            <div class="custom-card-body">
                <div class="custom-card-icon bg-blue"><i class="bi bi-cart-check"></i></div>
                <div class="custom-card-content">
                    <h5></h5>
                    <h2>$103,430</h2>
                    <p class="text-success">+5% than last month</p>
                </div>
            </div>
        </div>
    </div>

		</main>
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/script.js"></script>
	
</body>
</html>