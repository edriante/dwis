<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="./assets/img/download (2).png">
	<link rel="stylesheet" href="./assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

	<title>Admin</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class="bi bi-smile"></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class="bi bi-house-door"></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="bi bi-gear"></i>
					<span class="text">Settings</span>
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
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class="bi bi-list"></i>
			
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class="bi bi-bell"></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png" alt="Profile">
			</a>
		</nav>
		
		<!-- MAIN -->
		<main>
			
		</main>
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/js/script.js"></script>
</body>
</html>