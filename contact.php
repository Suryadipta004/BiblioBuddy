<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioBuddy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="icon" href="img/fabicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .navbar {
        padding-top: 1rem;
        padding-bottom: 0.9rem;
    }

    .contact-section {
        padding: 3rem 0;
        background-color: #f9f9f9;
    }

    .contact-title {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .contact-form .form-control {
        border-radius: 1.5rem;
        box-shadow: none;
        border-color: #0d6efd;
    }

    .contact-form .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
        border-radius: 1.5rem;
    }

    .contact-info {
        font-size: 1.1rem;
    }

    .contact-info i {
        font-size: 1.5rem;
        color: #0d6efd;
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
                            <a class="nav-link active" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="about.php">About</a>
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

        <!-- Contact Section -->
        <section class="contact-section py-5">
            <div class="container">
                <!-- Section Title -->
                <div class="text-center mb-4 px-3">
                    <h2 class="contact-title text-primary display-3 font-weight-bold mb-2">
                        Let's Connect!
                    </h2>
                    <p class="lead text-muted">
                        Have any questions, ideas, or feedback? We'd love to hear from you!
                        Our team is ready to assist you with orders, partnerships, or anything else you need.
                        Simply fill out the form below — we'll get back to you as soon as possible.
                    </p>
                    <p class="small text-secondary">
                        You can also reach us directly via email or phone. We’re always here to help!
                    </p>
                </div>


                <div class="row justify-content-center">
                    <!-- Contact Form -->
                    <div class="col-md-6">
                        <form class="contact-form shadow-lg p-4 rounded" method="POST" action="php/process_contact.php">
                            <div class="mb-3">
                                <label for="name" class="form-label fs-5">Full Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name..." required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fs-5">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email..." required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label fs-5">Your Message</label>
                                <textarea class="form-control form-control-lg" id="message" name="message" rows="6" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                        </form>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="contact-info bg-light shadow-lg p-4 rounded">
                            <h4 class="mb-4 text-primary">Contact Information</h4>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="fas fa-phone-alt text-primary me-2"></i>
                                    <span class="fs-5">Phone: <strong>+1 234 567 890</strong></span>
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <span class="fs-5">Email: <strong>support@bibliobuddy.com</strong></span>
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span class="fs-5">Address: <strong>123 Book Street, Fictional City, ABC 12345</strong></span>
                                </li>
                            </ul>

                            <!-- Map Image -->
                            <h5 class="text-primary mt-4 mb-3">Find Us Here</h5>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.0054622017274!2d88.41279377530033!3d22.567819079495113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02743328d5cc2d%3A0x8e2706e94fa62bd3!2sUniversity%20of%20Calcutta%2C%20Technology%20Campus!5e1!3m2!1sen!2sin!4v1745805054936!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php include('footer.php'); ?>
</body>

</html>