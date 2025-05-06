<?php
session_start();

# If the admin is logged in
if (
	isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])
) {

	# Database Connection File
	include "db_conn.php";

	# Book helper function
	include "php/func-book.php";
	$books = get_all_books($conn);

	# author helper function
	include "php/func-author.php";
	$authors = get_all_author($conn);

	# Category helper function
	include "php/func-category.php";
	$categories = get_all_categories($conn);

?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BiblioBuddy</title>
		<link rel="icon" href="img/fabicon.png" type="image/x-icon">

		<!-- bootstrap 5 CDN-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

		<!-- bootstrap 5 Js bundle CDN-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<!-- Font Awesome CDN for icons -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
		<!-- Add Font Awesome CDN for icons -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

		<!-- Custom Styles and Animation-->
		<style>
			.navbar {
				padding-top: 1rem;
				padding-bottom: 0.9rem;
			}

			/* Hover Effect for Table Rows */
			.table-hover tbody tr:hover {
				background-color: #f1f1f1;
				transform: scale(1.02);
				transition: transform 0.3s ease, background-color 0.3s ease;
			}

			/* Style for Table Borders */
			.table-bordered {
				border: 2px solid #dee2e6;
			}


			/* Table Text Alignment */
			.table th,
			.table td {
				vertical-align: middle;
			}

			.navbar-nav .nav-link i {
				margin-right: 5px;
				/* Adds space between the icon and the text */
			}


			/* Stripes for Table */
			.table-striped tbody tr:nth-of-type(odd) {
				background-color: #f9f9f9;
			}

			/* Table Header Styling */
			.table th {
				background-color: #f8f9fa;
				color: #495057;
			}

			/* Action Buttons Styling */
			.table .btn {
				border-radius: 25px;
				font-size: 14px;
				padding: 6px 12px;
				transition: transform 0.2s ease, background-color 0.2s ease;
			}

			/* Action Buttons Hover Effect */
			.table .btn:hover {
				transform: scale(1.05);
			}

			/* Alert Styling */
			.alert {
				margin-top: 20px;
			}

			/* Custom Link Styling for Book Title */
			.table a {
				text-decoration: none;
				color: rgb(0, 0, 0);
			}

			.table a:hover {
				color: #0056b3;
			}

			/* Tooltip Styling */
			.tooltip-inner {
				background-color: #6c757d;
			}

			#search-btn:hover {
				transform: scale(1.05);
				box-shadow: 0 0.2rem 1rem rgba(0, 123, 255, 0.3);
			}

			.navbar-nav .nav-link:hover {
				color: #f1c40f;
				/* Gold color on hover */
			}

			.logout-btn {
				background-color: #dc3545;
				/* Bootstrap red */
				color: white;
				border-radius: 4px;
				/* Optional: To make the corners rounded */
				padding: 5px 10px;
				/* Optional: Adjust padding */
				transition: background-color 0.3s;
			}

			.logout-btn:hover {
				background-color: #c82333;
				/* Darker red on hover */
				color: white;
			}



			table tbody tr:hover {
				background-color: rgb(232, 230, 230);
				/* Light gray background on hover */
				transition: background-color 0.3s ease-in-out;
			}

			@media (min-width: 1200px) {

				.container {
					max-width: 2280px;
				}
			}

			/* Improve Table Responsiveness */
			@media (max-width: 767px) {

				.table th,
				.table td {
					font-size: 12px;
				}
			}
		</style>

	</head>

	<body>
		<div class="container">
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

			<div>
				<form action="search.php" method="get" style="width: 100%; max-width: 30rem;">
					<div class="input-group my-2 shadow-sm">
						<input
							type="text"
							class="form-control form-control-lg"
							name="key"
							placeholder="Search for a book..."
							aria-label="Search for a book..."
							aria-describedby="search-btn"
							style="border-right: 0;">
						<button
							class="btn btn-primary d-flex align-items-center justify-content-center"
							type="submit"
							id="search-btn"
							style="border-top-left-radius: 0; border-bottom-left-radius: 0; transition: all 0.3s;">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>
			</div>

			<div class="mt-4"></div>
			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?= htmlspecialchars($_GET['error']); ?>
				</div>
			<?php } ?>
			<?php if (isset($_GET['success'])) { ?>
				<div class="alert alert-success" role="alert">
					<?= htmlspecialchars($_GET['success']); ?>
				</div>
			<?php } ?>


			<?php if ($books == 0) { ?>
				<div class="alert alert-warning 
        	            text-center p-5"
					role="alert">
					<img src="img/empty.png"
						width="100">
					<br>
					There is no book in the database
				</div>
			<?php } else { ?>


				<!-- List of all books -->
				<div class="d-flex align-items-center mb-4">
					<h4 class="me-2 fw-bold text-primary">
						<i class="fas fa-book me-2"></i>All Books
					</h4>
					<div class="flex-grow-1 border-bottom border-primary" style="height: 2px;"></div>
				</div>

				<table class="table table-bordered shadow">
					<thead class="bg-primary text-white">
						<tr>
							<th class="text-center px-3 py-2">No.</th>
							<th class="text-center px-3 py-2">Title</th>
							<th class="text-center px-3 py-2">Author</th>
							<th class="text-center px-3 py-2">Description</th>
							<th class="text-center px-3 py-2">Category</th>
							<th class="text-center px-3 py-2">Action</th>
						</tr>
					</thead>


					<tbody>
						<?php
						$i = 0;
						foreach ($books as $book) {
							$i++;
						?>
							<tr>
								<td class="align-middle text-center fw-bold"><?= $i ?></td>
								<td class="d-flex align-items-center gap-3">
									<img src="uploads/cover/<?= $book['cover'] ?>" alt="Cover" width="60" height="90" class="rounded shadow-sm" style="object-fit: cover;">
									<div>
										<a href="uploads/files/<?= $book['file'] ?>" class="text-decoration-none fw-semibold text-dark">
											<?= htmlspecialchars($book['title']) ?>
										</a>
									</div>
								</td>

								<td>
									<?php if ($authors == 0) {
										echo "Undefined";
									} else {

										foreach ($authors as $author) {
											if ($author['id'] == $book['author_id']) {
												echo $author['name'];
											}
										}
									}
									?>

								</td>
								<td>
									<span class="d-inline-block text-truncate" style="max-width: 200px;" title="<?= htmlspecialchars($book['description']) ?>">
										<?= htmlspecialchars($book['description']) ?>
									</span>
								</td>

								<td>
									<?php if ($categories == 0) {
										echo "Undefined";
									} else {

										foreach ($categories as $category) {
											if ($category['id'] == $book['category_id']) {
												echo $category['name'];
											}
										}
									}
									?>
								</td>
								<td>
									<a href="edit-book.php?id=<?= $book['id'] ?>"
										class="btn btn-sm btn-outline-warning me-2 d-inline-flex align-items-center"
										style="transition: 0.3s;">
										<i class="fas fa-edit me-1"></i> Edit
									</a>

									<a href="php/delete-book.php?id=<?= $book['id'] ?>"
										class="btn btn-sm btn-outline-danger d-inline-flex align-items-center"
										style="transition: 0.3s;"
										onclick="return confirm('Are you sure you want to delete this book?');">
										<i class="fas fa-trash-alt me-1"></i> Delete
									</a>
								</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>

			<?php if ($categories == 0) { ?>
				<div class="alert alert-warning 
        	            text-center p-5"
					role="alert">
					<img src="img/empty.png"
						width="100">
					<br>
					There is no category in the database
				</div>
			<?php } else { ?>
				<!-- List of all categories -->
				<div class="d-flex align-items-center mt-5 mb-4">
					<h4 class="me-2 fw-bold text-success">
						<i class="fas fa-list-alt me-2"></i>All Categories
					</h4>
					<div class="flex-grow-1 border-bottom border-success" style="height: 2px;"></div>
				</div>
				<table class="table table-bordered shadow">
					<thead>
						<tr>
							<th>No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$j = 0;
						foreach ($categories as $category) {
							$j++;
						?>
							<tr>
								<td><?= $j ?></td>
								<td><?= $category['name'] ?></td>
								<td>
									<a href="edit-category.php?id=<?= $category['id'] ?>"
										class="btn btn-sm btn-outline-warning me-2 d-inline-flex align-items-center"
										style="transition: 0.3s;">
										<i class="fas fa-edit me-1"></i> Edit
									</a>

									<a href="php/delete-category.php?id=<?= $category['id'] ?>"
										class="btn btn-sm btn-outline-danger d-inline-flex align-items-center"
										style="transition: 0.3s;"
										onclick="return confirm('Are you sure you want to delete this category?');">
										<i class="fas fa-trash-alt me-1"></i> Delete
									</a>
								</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>

			<?php if ($authors == 0) { ?>
				<div class="alert alert-warning 
        	            text-center p-5"
					role="alert">
					<img src="img/empty.png"
						width="100">
					<br>
					There is no author in the database
				</div>
			<?php } else { ?>
				<!-- List of all Authors -->
				<div class="d-flex align-items-center mt-5 mb-4">
					<h4 class="me-2 fw-bold text-warning">
						<i class="fas fa-user-edit me-2"></i>All Authors
					</h4>
					<div class="flex-grow-1 border-bottom border-warning" style="height: 2px;"></div>
				</div>

				<table class="table table-bordered shadow">
					<thead>
						<tr>
							<th>No.</th>
							<th>Author Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$k = 0;
						foreach ($authors as $author) {
							$k++;
						?>
							<tr>
								<td><?= $k ?></td>
								<td><?= $author['name'] ?></td>
								<td>
									<a href="edit-author.php?id=<?= $author['id'] ?>"
										class="btn btn-sm btn-outline-warning me-2 d-inline-flex align-items-center"
										style="transition: 0.3s;">
										<i class="fas fa-edit me-1"></i> Edit
									</a>

									<a href="php/delete-author.php?id=<?= $author['id'] ?>"
										class="btn btn-sm btn-outline-danger d-inline-flex align-items-center"
										style="transition: 0.3s;"
										onclick="return confirm('Are you sure you want to delete this author?');">
										<i class="fas fa-trash-alt me-1"></i> Delete
									</a>
								</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
		<?php include('footer.php'); ?>
	</body>

	</html>

<?php } else {
	header("Location: login.php");
	exit;
} ?>