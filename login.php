<?php
session_start();

# If the admin is logged in
if (
	!isset($_SESSION['user_id']) &&
	!isset($_SESSION['user_email'])
) {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>LOGIN</title>
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
		</style>
	</head>

	<body>
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
		<div class="d-flex justify-content-center align-items-center bg-light" style="min-height: 85vh;">
			<form class="p-5 rounded-4 shadow-lg bg-white" style="max-width: 28rem; width: 100%;" method="POST" action="php/auth.php">

				<h2 class="text-center mb-4 text-primary fw-bold">Welcome Back</h2>
				<p class="text-center text-muted mb-4">Please enter your credentials to continue</p>

				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
						<?= htmlspecialchars($_GET['error']); ?>
					</div>
				<?php } ?>

				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="name@example.com" required>
				</div>

				<div class="mb-4">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="••••••••" required>
				</div>

				<div class="d-grid mb-3">
					<button type="submit" class="btn btn-primary btn-lg">Login</button>
				</div>

				<div class="text-center">
					<a href="index.php" class="btn btn-outline-secondary btn-sm">← Back to Store</a>
				</div>

			</form>
		</div>

		<?php include('footer.php'); ?>

	</body>

	</html>

<?php } else {
	header("Location: admin.php");
	exit;
} ?>