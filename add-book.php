<?php
session_start();

// Ensure admin is logged in
if (isset($_SESSION['user_id'], $_SESSION['user_email'])) {

	require "db_conn.php";
	require "php/func-category.php";
	require "php/func-author.php";

	$categories = get_all_categories($conn);
	$authors    = get_all_author($conn);

	// Initialize variables from GET parameters or defaults
	$title       = $_GET['title'] ?? '';
	$desc        = $_GET['desc'] ?? '';
	$category_id = $_GET['category_id'] ?? 0;
	$author_id   = $_GET['author_id'] ?? 0;
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BiblioBuddy</title>
		<link rel="icon" href="img/fabicon.png" type="image/x-icon">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

		<style>
			.form-container {
				max-width: 60rem;
				width: 95%;
				margin: 3rem auto;
				background: #fff;
				padding: 3rem;
				border-radius: 1.25rem;
				box-shadow: 0 0 2rem rgba(0, 0, 0, 0.1);
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

			@media (min-width: 1200px) {
				.container {
					max-width: 2280px;
				}
			}
		</style>
	</head>

	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<div class="container-fluid">
					<a href="admin.php" class="navbar-brand d-flex align-items-center text-white fw-bold fs-5 px-3 py-2 rounded" style="background-color: #198754;">
						<i class="fas fa-cogs me-2"></i>
						<span>Admin</span>
					</a>

					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item me-4">
								<a class="nav-link text-white" href="index.php"><i class="fas fa-store"></i> Store</a>
							</li>
							<li class="nav-item me-4">
								<a class="nav-link text-white" href="add-book.php"><i class="fas fa-book"></i> Add Book</a>
							</li>
							<li class="nav-item me-4">
								<a class="nav-link text-white" href="add-category.php"><i class="fas fa-tags"></i> Add Category</a>
							</li>
							<li class="nav-item me-4">
								<a class="nav-link text-white" href="add-author.php"><i class="fas fa-user"></i> Add Author</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white logout-btn" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<form action="php/add-book.php" method="post" enctype="multipart/form-data" class="form-container">
				<h2 class="text-center text-primary mb-4 fw-bold">Add New Book</h2>

				<?php if (isset($_GET['error'])): ?>
					<div class="alert alert-danger"><?= htmlspecialchars($_GET['error']); ?></div>
				<?php endif; ?>

				<?php if (isset($_GET['success'])): ?>
					<div class="alert alert-success"><?= htmlspecialchars($_GET['success']); ?></div>
				<?php endif; ?>

				<div class="mb-4">
					<label class="form-label fw-semibold"><i class="fas fa-heading me-2"></i>Book Title</label>
					<input type="text" class="form-control" name="book_title" value="<?= htmlspecialchars($title) ?>">
				</div>

				<div class="mb-3">
					<label class="form-label fw-semibold"><i class="fas fa-align-left me-2"></i>Book Description</label>
					<input type="text" class="form-control" name="book_description" value="<?= htmlspecialchars($desc) ?>">
				</div>

				<div class="mb-3">
					<label class="form-label fw-semibold"><i class="fas fa-user-edit me-2"></i>Book Author</label>
					<select name="book_author" class="form-select">
						<option value="0">Select author</option>
						<?php foreach ($authors ?: [] as $author): ?>
							<option value="<?= $author['id'] ?>" <?= $author_id == $author['id'] ? 'selected' : '' ?>>
								<?= htmlspecialchars($author['name']) ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label fw-semibold"><i class="fas fa-folder-open me-2"></i>Book Category</label>
					<select name="book_category" class="form-select">
						<option value="0">Select category</option>
						<?php foreach ($categories ?: [] as $category): ?>
							<option value="<?= $category['id'] ?>" <?= $category_id == $category['id'] ? 'selected' : '' ?>>
								<?= htmlspecialchars($category['name']) ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label fw-semibold"><i class="fas fa-image me-2"></i>Book Cover</label>
					<input type="file" class="form-control" name="book_cover">
				</div>

				<div class="mb-3">
					<label class="form-label fw-semibold"><i class="fas fa-file-alt me-2"></i>Book File</label>
					<input type="file" class="form-control" name="file">
				</div>

				<button type="submit" class="btn btn-success btn-lg">Add Book</button>
			</form>
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