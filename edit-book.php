<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

	if (!isset($_GET['id'])) {
		header("Location: admin.php");
		exit;
	}

	$id = $_GET['id'];

	include "db_conn.php";
	include "php/func-book.php";
	$book = get_book($conn, $id);

	if ($book == 0) {
		header("Location: admin.php");
		exit;
	}

	include "php/func-category.php";
	$categories = get_all_categories($conn);

	include "php/func-author.php";
	$authors = get_all_author($conn);
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BiblioBuddy</title>
		<link rel="icon" href="img/fabicon.png" type="image/x-icon">

		<!-- Bootstrap & Font Awesome -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

		<!-- Custom Style -->
		<link rel="stylesheet" href="css/style.css">
		<style>
			.form-container {
				max-width: 50rem;
				width: 95%;
				margin: 3rem auto;
				background: #fff;
				padding: 3rem;
				border-radius: 1.25rem;
				box-shadow: 0 0 2rem rgba(0, 0, 0, 0.1);
			}

			@media (min-width: 1200px) {
				.container {
					max-width: 2280px;
				}
			}

			.navbar {
				padding-top: 1rem;
				padding-bottom: 0.9rem;
			}

			.admin-btn,
			.login-btn {
				color: white;
				border-radius: 4px;
				padding: 5px 10px;
				transition: background-color 0.3s;
			}

			.admin-btn {
				background-color: rgb(8, 241, 16);
			}

			.login-btn {
				background-color: rgb(8, 23, 241);
			}
		</style>
	</head>

	<body>
		<div class="container">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<div class="container-fluid">
					<a class="navbar-brand fs-3 fw-bold" href="index.php">
						<i class="fas fa-book me-2"></i> Online Book Store
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item me-4">
								<a class="nav-link active" href="index.php">Store</a>
							</li>
							<li class="nav-item me-4">
								<a class="nav-link" href="contact.php">Contact</a>
							</li>
							<li class="nav-item me-4">
								<a class="nav-link" href="about.php">About</a>
							</li>
							<li class="nav-item me-4">
								<?php if (isset($_SESSION['user_id'])) { ?>
									<a class="nav-link admin-btn" href="admin.php">Admin</a>
								<?php } else { ?>
									<a class="nav-link login-btn" href="login.php">Login</a>
								<?php } ?>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<!-- Edit Book Form -->
			<form action="php/edit-book.php" method="post" enctype="multipart/form-data" class="form-container">
				<h2 class="text-center text-primary mb-4 fw-bold">Edit Book Details</h2>

				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger"><?= htmlspecialchars($_GET['error']); ?></div>
				<?php } ?>
				<?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success"><?= htmlspecialchars($_GET['success']); ?></div>
				<?php } ?>

				<input type="hidden" value="<?= $book['id'] ?>" name="book_id">

				<div class="mb-4">
					<label class="form-label fw-semibold"><i class="fas fa-heading me-2"></i>Book Title</label>
					<input type="text" class="form-control form-control-lg" value="<?= $book['title'] ?>" name="book_title" required autofocus>
				</div>

				<div class="mb-4">
					<label class="form-label fw-semibold"><i class="fas fa-align-left me-2"></i>Book Description</label>
					<textarea class="form-control form-control-lg" rows="3" name="book_description" required><?= $book['description'] ?></textarea>
				</div>

				<div class="mb-4">
					<label class="form-label fw-semibold"><i class="fas fa-user-edit me-2"></i>Book Author</label>
					<select name="book_author" class="form-select form-select-lg" required>
						<option value="0" disabled <?= $book['author_id'] == 0 ? 'selected' : '' ?>>-- Select Author --</option>
						<?php
						if ($authors != 0) {
							foreach ($authors as $author) {
								$selected = ($book['author_id'] == $author['id']) ? 'selected' : '';
								echo "<option value='{$author['id']}' $selected>{$author['name']}</option>";
							}
						}
						?>
					</select>
				</div>

				<div class="mb-4">
					<label class="form-label fw-semibold"><i class="fas fa-folder-open me-2"></i>Book Category</label>
					<select name="book_category" class="form-select form-select-lg" required>
						<option value="0" disabled <?= $book['category_id'] == 0 ? 'selected' : '' ?>>-- Select Category --</option>
						<?php
						if ($categories != 0) {
							foreach ($categories as $category) {
								$selected = ($book['category_id'] == $category['id']) ? 'selected' : '';
								echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
							}
						}
						?>
					</select>
				</div>

				<div class="mb-4">
					<label class="form-label fw-semibold"><i class="fas fa-image me-2"></i>Book Cover</label>
					<input type="file" class="form-control" name="book_cover">
					<input type="hidden" value="<?= $book['cover'] ?>" name="current_cover">
					<small class="d-block mt-2">Current: <a href="uploads/cover/<?= $book['cover'] ?>" target="_blank">View Cover</a></small>
				</div>

				<div class="mb-4">
					<label class="form-label fw-semibold"><i class="fas fa-file-alt me-2"></i>Book File</label>
					<input type="file" class="form-control" name="file">
					<input type="hidden" value="<?= $book['file'] ?>" name="current_file">
					<small class="d-block mt-2">Current: <a href="uploads/files/<?= $book['file'] ?>" target="_blank">View File</a></small>
				</div>

				<div class="d-grid">
					<button type="submit" class="btn btn-success btn-lg">Update Book</button>
				</div>
			</form>
		</div>

		<?php include('footer.php'); ?>
	</body>

	</html>

<?php } else {
	header("Location: login.php");
	exit;
} ?>