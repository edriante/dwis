<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/download (2).png">
	<link rel="stylesheet" href="../assets/css/manageusers.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

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
    <a href="<?= site_url('Main_controller/manage  Categories'); ?>">
        <i class="bi bi-tag"></i>
        <span class="text">Categories</span>
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
		<!--Table-->
		<main>
    <h2>Category</h2>
    <div class="search-container">
        <input type="text" placeholder="Search category..." id="userSearch">
		<button>Search</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Service Name</th>
                <th>Parent Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id']; ?></td>
                <td><img src="<?= $category['img']; ?>" alt="Profile"></td>
                <td><?= $category['username']; ?></td>
                <td><?= $category['email']; ?></td>
                <td><?= $category ['role']; ?></td>
                <td>
                    <div class="action-icons">
                        <a href="#" class="edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="#" class="delete"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/manageusers.js"></script>
	
</body>
</html>