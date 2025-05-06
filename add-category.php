<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BiblioBuddy</title>
		<link rel="icon" href="img/fabicon.png" type="image/x-icon">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

		<!-- bootstrap 5 Js bundle CDN-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<!-- Font Awesome CDN for icons -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
		<!-- Add Font Awesome CDN for icons -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

		<style>
			body {
				background-color: #f8f9fa;
			}

			.form-container {
				background-color: white;
				padding: 2.5rem;
				border-radius: 1rem;
				box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
			}

			.btn-primary:hover {
				background-color: #0056b3;
			}

			.logout-btn {
				background-color: #dc3545;
				color: white;
				border-radius: 4px;
				padding: 5px 10px;
				transition: background-color 0.3s;
			}

			.logout-btn:hover {
				background-color: #c82333;
				color: white;
			}

			.navbar {
				padding-top: 1rem;
				padding-bottom: 0.9rem;
			}

			.btn-primary:hover {
				background-color: rgb(9, 80, 186);
				transform: scale(1.02);
				transition: all 0.2s ease-in-out;
			}

			.form-control:focus {
				border-color: #0d6efd;
				box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
			}
		</style>
	</head>

	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a href="admin.php" class="navbar-brand d-flex align-items-center text-white fw-bold fs-5 px-3 py-2 rounded transition" style="background-color: #198754;" aria-label="Go to Admin Dashboard">
					<i class="fas fa-cogs me-2"></i>
					<span>Admin</span>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="index.php">
								<i class="fas fa-store"></i> Store
							</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="add-book.php">
								<i class="fas fa-book"></i> Add Book
							</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="add-category.php">
								<i class="fas fa-tags"></i> Add Category
							</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="add-author.php">
								<i class="fas fa-user"></i> Add Author
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white logout-btn" href="logout.php">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Main Content -->
		<div class="d-flex justify-content-center align-items-center vh-100">
			<div class="form-container w-100" style="max-width: 500px;">
				<h2 class="text-center mb-2 fw-bold text-primary display-10">
					<i class="fas fa-folder-plus me-2"></i> Add New Category
				</h2>
				<hr class="mx-auto mt-0 mb-4" style="width: 80px; border-top: 3px solid #0d6efd; border-radius: 3px;">

				<?php if (isset($_GET['error'])): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fas fa-exclamation-circle me-2"></i>
						<?= htmlspecialchars($_GET['error']); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>

				<?php if (isset($_GET['success'])): ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fas fa-check-circle me-2"></i>
						<?= htmlspecialchars($_GET['success']); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>


				<form action="php/add-category.php" method="post">
					<div class="mb-4">
						<label for="category_name" class="form-label fw-bold text-secondary">Category Name</label>
						<div class="input-group shadow-sm">
							<span class="input-group-text bg-primary text-white">
								<i class="fas fa-tag"></i>
							</span>
							<input type="text" class="form-control form-control-lg" id="category_name" name="category_name" placeholder="Enter category name" required>
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm rounded-3 py-2">
						<i class="fas fa-plus-circle me-2"></i> Add Category
					</button>
				</form>
			</div>
		</div>
		<?php include('footer.php'); ?>

	</body>

	</html>

<?php
} else {
	header("Location: login.php");
	exit;
}
?>