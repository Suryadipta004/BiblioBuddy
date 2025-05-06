<?php
session_start();

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

	<!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="icon" href="img/fabicon.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	<!-- bootstrap 5 Js bundle CDN-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="css/style.css">

	<style>
		@media (min-width: 1200px) {
			.container {
				max-width: 2280px;
			}
		}

		.navbar {
			padding-top: 1rem;
			padding-bottom: 0.9rem;
		}

		.list-group-item.bg-primary:hover {
			background-color: #0b5ed7;
			transition: background-color 0.2s ease-in-out;
		}

		.list-hover-effect:hover {
			background-color: #f0f8ff;
			transform: translateY(-1px);
			transition: all 0.2s ease-in-out;
		}

		.hover-effect:hover {
			transform: scale(1.05);
			background-color: #0056b3;
			/* Darker blue for download */
			transition: all 0.3s ease;
		}

		.btn-success:hover {
			background-color: #218838;
			/* Darker green for open */
		}

		.card-title:hover {
			color: #0d6efd;
			/* Bootstrap blue */
			text-decoration: underline;
			transition: all 0.3s ease;
		}

		.pdf-list {
			width: 100%;
		}

		.card-img-top:hover {
			transform: scale(1.05);
			transition: transform 0.3s ease;
		}
	</style>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand fs-3 fw-bold " href="index.php">
					<i class="fas fa-book me-2"></i> Online Book Store
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse"
					id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item me-4">
							<a class="nav-link active"
								aria-current="page"
								href="index.php">Store</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link"
								href="contact.php">Contact</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link"
								href="about.php">About</a>
						</li>
						<li class="nav-item me-4">
							<?php if (isset($_SESSION['user_id'])) { ?>
								<a class="nav-link" style="background-color: rgb(8, 241, 16);
			color: white;
			border-radius: 4px;
			padding: 5px 10px;
			transition: background-color 0.3s;"
									href="admin.php">Admin</a>
							<?php } else { ?>
								<a class="nav-link" style="background-color: rgb(8, 23, 241);
			color: white;
			border-radius: 4px;
			padding: 5px 10px;
			transition: background-color 0.3s;"
									href="login.php">Login</a>
							<?php } ?>

						</li>
					</ul>
				</div>
			</div>
		</nav>
		<form action="search.php"
			method="get"
			style="width: 100%; max-width: 30rem">

			<div class="input-group my-2">
				<input type="text"
					class="form-control"
					name="key"
					placeholder="Search Book..."
					aria-label="Search Book..."
					aria-describedby="basic-addon2">

				<button class="input-group-text
		                 btn btn-primary"
					id="basic-addon2">
					<img src="img/search.png"
						width="20">

				</button>
			</div>
		</form>
		<div class="d-flex">
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
				<div <div class="pdf-list d-flex flex-wrap justify-content-between">
					<?php foreach ($books as $book) { ?>
						<div class="card m-3 shadow-lg" style="width: 18rem; transition: transform 0.3s ease-in-out;">
							<img src="uploads/cover/<?= htmlspecialchars($book['cover']) ?>"
								class="card-img-top rounded-3 shadow-sm"
								alt="Cover of <?= htmlspecialchars($book['title']) ?>">
							<div class="card-body">
								<h5 class="card-title text-center text-dark fs-5 fw-bold" title="<?= htmlspecialchars($book['title']) ?>">
									<?= htmlspecialchars($book['title']) ?>
								</h5>

								<div class="card-text">
									<div class="d-flex align-items-center mb-2">
										<i class="fas fa-user me-2 text-primary"></i>
										<strong>By:</strong>
										<?php foreach ($authors as $author) {
											if ($author['id'] == $book['author_id']) {
												echo htmlspecialchars($author['name']);
												break;
											}
										} ?>
									</div>

									<div class="description mb-3">
										<?= nl2br(htmlspecialchars($book['description'])) ?>
									</div>

									<div class="d-flex align-items-center mb-3">
										<i class="fas fa-folder-open me-2 text-warning"></i>
										<strong>Category:</strong>
										<?php foreach ($categories as $category) {
											if ($category['id'] == $book['category_id']) {
												echo htmlspecialchars($category['name']);
												break;
											}
										} ?>
									</div>
								</div>

								<div class="d-flex justify-content-between mt-3">
									<a href="uploads/files/<?= $book['file'] ?>" class="btn btn-success d-flex align-items-center shadow-sm hover-effect">
										<i class="fas fa-eye me-2"></i> Open
									</a>

									<a href="uploads/files/<?= $book['file'] ?>" class="btn btn-primary d-flex align-items-center shadow-sm hover-effect" download="<?= $book['title'] ?>">
										<i class="fas fa-download me-2"></i> Download
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

			<?php } ?>

			<div class="category">
				<!-- List of categories -->
				<div class="list-group">
					<?php if ($categories == 0) {
						// do nothing
					} else { ?>
						<a href="#"
							class="list-group-item list-group-item-action bg-gradient bg-primary text-white fw-semibold d-flex align-items-center">
							<i class="fas fa-book me-2 fs-5"></i><span class="flex-grow-1">Category</span>
						</a>
						<?php foreach ($categories as $category) { ?>

							<a href="category.php?id=<?= htmlspecialchars($category['id']) ?>"
								class="list-group-item list-group-item-action d-flex align-items-center py-3 px-3 shadow-sm rounded-2 list-hover-effect">
								<i class="fas fa-book me-3 text-warning fs-5"></i>
								<span class="text-dark fw-medium"><?= htmlspecialchars($category['name']) ?></span>
							</a>

					<?php }
					} ?>
				</div>

				<!-- List of authors -->
				<div class="list-group mt-5 shadow-sm rounded-3 overflow-hidden">
					<?php if ($authors && count($authors) > 0): ?>
						<a href="#" class="list-group-item list-group-item-action bg-gradient bg-primary text-white fw-semibold d-flex align-items-center">
							<i class="fas fa-user me-2 fs-5"></i>
							<span class="flex-grow-1">Authors</span>
						</a>


						<?php foreach ($authors as $author): ?>
							<a href="author.php?id=<?= htmlspecialchars($author['id']) ?>"
								class="list-group-item list-group-item-action d-flex align-items-center list-hover-effect py-3 px-3 rounded-2 shadow-sm">
								<i class="fas fa-user-circle me-3 text-primary fs-5"></i>
								<span class="text-dark fw-medium"><?= htmlspecialchars($author['name']) ?></span>
							</a>

						<?php endforeach; ?>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>

</html>