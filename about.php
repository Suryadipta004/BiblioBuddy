<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioBuddy</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="icon" href="img/fabicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .navbar {
            padding-top: 1rem;
            padding-bottom: 0.9rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }


        .about-section {
            padding-top: 3rem;
        }

        .feature-icon {
            font-size: 3rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }

        .team-member img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
        }

        .team-member {
            text-align: center;
        }

        .overflow-hidden img:hover {
            transform: scale(1.05);
        }

        .hover-shadow-lg:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .hover-shadow-lg:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease;
        }

        .hover-glow:hover {
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.6), 0 0 25px rgba(13, 110, 253, 0.4);
            transition: box-shadow 0.4s ease;
        }

        .card-hover-effect {
            transition: all 0.4s ease;
            border: 2px solid transparent;
        }

        .card-hover-effect:hover {
            border: 2px solid #0d6efd;
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.2);
        }

        .section-bg {
            background: linear-gradient(to right, #ffffff, #e9f0ff);
            padding: 4rem 0;
        }

        .team-member img:hover {
            transform: scale(1.08);
            box-shadow: 0 0 20px rgba(13, 110, 253, 0.5);
        }

        /* Ensure transitions are smooth */
        img,
        .card,
        .hover-shadow-lg,
        .hover-glow {
            transition: all 0.4s ease-in-out;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 2280px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 2280px;
            }
        }

        @media (min-width: 200px) {
            .container {
                max-width: 2280px;
            }
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item me-4">
                            <a class="nav-link" href="index.php">Store</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link active" href="about.php">About</a>
                        </li>
                        <li class="nav-item me-4">
                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <a class="nav-link" style="background-color: rgb(8, 241, 16); color: white; border-radius: 4px; padding: 5px 10px;" href="admin.php">Admin</a>
                            <?php } else { ?>
                                <a class="nav-link" style="background-color: rgb(8, 23, 241); color: white; border-radius: 4px; padding: 5px 10px;" href="login.php">Login</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- About Section -->
        <section class="about-section">
            <div class="row align-items-center mb-5">

                <!-- Carousel Column -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="libraryCarousel" class="carousel slide shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel" style="max-height: 500px;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/about-library1.jpg" class="d-block w-100" alt="Library Image 1" style="object-fit: cover; height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img src="img/about-library2.jpg" class="d-block w-100" alt="Library Image 2" style="object-fit: cover; height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img src="img/about-library3.jpg" class="d-block w-100" alt="Library Image 3" style="object-fit: cover; height: 500px;">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#libraryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:rgb(3, 22, 50);padding:1.5rem;"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#libraryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgb(3, 22, 50); padding:1.5rem;"></span>
                        </button>
                    </div>
                </div>

                <!-- Text Column -->
                <div class="col-md-6">
                    <h2 class="mb-4 text-primary display-6">
                        Our Mission
                    </h2>
                    <div class="text-gray-700 fs-5">
                        <p class="mb-4">
                            At <span class="fw-semibold text-primary">BiblioBuddy</span>, we believe in making knowledge accessible to everyone.
                            Our seamless online platform empowers readers to explore, open, and download books across a wide range of genres,
                            penned by talented authors from around the world.
                            Whether you're looking for timeless classics, groundbreaking research, or the latest bestsellers,
                            our curated collection ensures there's something for every curious mind.
                        </p>
                        <p>
                            Whether you're a casual reader, a dedicated student, or a passionate researcher —
                            <span class="fw-semibold text-primary">BiblioBuddy</span> is your trusted digital library, always at your fingertips.
                            With user-friendly navigation, personalized recommendations, and instant access to a world of literature,
                            we make it easier than ever to fuel your passion for reading.
                            Join our growing community today and unlock endless adventures through the power of books.
                        </p>
                    </div>
                </div>

            </div>


            <div class="row text-center mb-5">
                <h2 class="text-primary display-6">What We Offer</h2>
                <div class="col-md-4 mb-4">
                    <div class="p-5 shadow-lg rounded-4 bg-white h-100 d-flex flex-column align-items-center justify-content-center hover-shadow-lg transition-transform">
                        <div class="feature-icon mb-3 d-flex align-items-center justify-content-center rounded-circle shadow-sm" style="background: rgb(218, 234, 250); width: 70px; height: 70px;">
                            <i class="fas fa-book text-primary fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Wide Range of Books</h5>
                        <p class="text-muted text-center">
                            Thousands of books across categories like Science, Fiction, History, Technology, and more.
                            Whether you're seeking academic materials, thrilling novels, or inspiring biographies,
                            you'll find endless treasures waiting to be discovered.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="p-5 shadow-lg rounded-4 bg-white h-100 d-flex flex-column align-items-center justify-content-center hover-shadow-lg transition-transform">
                        <div class="feature-icon mb-3 d-flex align-items-center justify-content-center rounded-circle shadow-sm" style="background: rgb(218, 234, 250); width: 70px; height: 70px;">
                            <i class="fas fa-laptop text-primary fs-3"></i> <!-- Changed icon -->
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Easy Access</h5>
                        <p class="text-muted text-center">
                            Read online or download your favorite books anytime, anywhere with a single click.
                            Our platform is optimized for both desktop and mobile, ensuring that your reading experience is seamless and hassle-free across all devices.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="p-5 shadow-lg rounded-4 bg-white h-100 d-flex flex-column align-items-center justify-content-center hover-shadow-lg transition-transform">
                        <div class="feature-icon mb-3 d-flex align-items-center justify-content-center rounded-circle shadow-sm" style="background: rgb(218, 234, 250); width: 70px; height: 70px;">
                            <i class="fas fa-users text-primary fs-3"></i> <!-- Changed icon -->
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Community Support</h5>
                        <p class="text-muted text-center">
                            Join our growing community of book lovers and share your reading experiences!
                            Engage in discussions, recommend books, and connect with like-minded readers who share your passion for learning and exploration.
                        </p>
                    </div>
                </div>
            </div>



            <!-- Team Section (Optional) -->
            <div class="text-center">
                <h2 class="text-primary display-6">Meet the Team</h2>
                <div class="row justify-content-center">
                    <div class="col-md-3 col-sm-6 mb-4 team-member">
                        <div class="card border-0 rounded-4 card-hover-effect" style="box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);">
                            <!-- Blue Circle with Image -->
                            <div class="mx-auto mt-3" style="width: 140px; height: 140px; border: 4px solid rgb(13 110 253); border-radius: 50%; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <img src="img/author-1.jpg" alt="Team Member 1" class="rounded-circle" style="width: 120px; height: 120px;">
                            </div>

                            <div class="card-body text-center">
                                <!-- Name and Title -->
                                <h5 class="fw-bold text-dark mb-1">Alex Johnson</h5>
                                <p class="text-muted mb-2">Founder & CEO</p>

                                <!-- Star Ratings -->
                                <div class="mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i> <!-- Half star -->
                                </div>

                                <!-- Social Media Icons -->
                                <div>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-facebook fa-lg"></i></a>
                                    <a href="#" class="text-info mx-1"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-linkedin fa-lg"></i></a>
                                    <a href="#" class="text-danger mx-1"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6 mb-4 team-member">
                        <div class="card border-0 rounded-4 card-hover-effect" style="box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);">
                            <!-- Blue Circle with Image -->
                            <div class="mx-auto mt-3" style="width: 140px; height: 140px; border: 4px solid rgb(13 110 253); border-radius: 50%; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <img src="img/author-2.jpg" alt="Team Member 1" class="rounded-circle" style="width: 120px; height: 120px;">
                            </div>

                            <div class="card-body text-center">
                                <!-- Name and Title -->
                                <h5 class="fw-bold text-dark mb-1">Alex Johnson</h5>
                                <p class="text-muted mb-2">Founder & CEO</p>

                                <!-- Star Ratings -->
                                <div class="mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i> <!-- Half star -->
                                </div>

                                <!-- Social Media Icons -->
                                <div>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-facebook fa-lg"></i></a>
                                    <a href="#" class="text-info mx-1"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-linkedin fa-lg"></i></a>
                                    <a href="#" class="text-danger mx-1"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4 team-member">
                        <div class="card border-0 rounded-4 card-hover-effect" style="box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);">
                            <!-- Blue Circle with Image -->
                            <div class="mx-auto mt-3" style="width: 140px; height: 140px; border: 4px solid rgb(13 110 253); border-radius: 50%; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <img src="img/author-3.jpg" alt="Team Member 1" class="rounded-circle" style="width: 120px; height: 120px;">
                            </div>

                            <div class="card-body text-center">
                                <!-- Name and Title -->
                                <h5 class="fw-bold text-dark mb-1">Alex Johnson</h5>
                                <p class="text-muted mb-2">Founder & CEO</p>

                                <!-- Star Ratings -->
                                <div class="mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i> <!-- Half star -->
                                </div>

                                <!-- Social Media Icons -->
                                <div>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-facebook fa-lg"></i></a>
                                    <a href="#" class="text-info mx-1"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-linkedin fa-lg"></i></a>
                                    <a href="#" class="text-danger mx-1"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4 team-member">
                        <div class="card border-0 rounded-4 card-hover-effect" style="box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);">
                            <!-- Blue Circle with Image -->
                            <div class="mx-auto mt-3" style="width: 140px; height: 140px; border: 4px solid rgb(13 110 253); border-radius: 50%; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <img src="img/author-4.jpg" alt="Team Member 1" class="rounded-circle" style="width: 120px; height: 120px;">
                            </div>

                            <div class="card-body text-center">
                                <!-- Name and Title -->
                                <h5 class="fw-bold text-dark mb-1">Alex Johnson</h5>
                                <p class="text-muted mb-2">Founder & CEO</p>

                                <!-- Star Ratings -->
                                <div class="mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i> <!-- Half star -->
                                </div>

                                <!-- Social Media Icons -->
                                <div>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-facebook fa-lg"></i></a>
                                    <a href="#" class="text-info mx-1"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#" class="text-primary mx-1"><i class="fab fa-linkedin fa-lg"></i></a>
                                    <a href="#" class="text-danger mx-1"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include('footer.php'); ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>