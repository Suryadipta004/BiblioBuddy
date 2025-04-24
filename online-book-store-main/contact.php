<?php
//include('header.php');

// Handle form submission
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // For now, we just simulate saving or sending
    $success = "Thank you, $name! Your message has been received. We'll get back to you soon.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - BookNest</title>
    <style>
        .contact-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2c3e50;
        }

        form input, form textarea {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        form button {
            background-color: #2c3e50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #34495e;
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .store-info {
            margin-top: 40px;
            font-size: 16px;
            color: #444;
        }
    </style>
</head>
<body>

<div class="contact-container">
    <h2>Contact Us</h2>

    <?php if (!empty($success)) : ?>
        <div class="success-message"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="post" action="contact.php">
        <label for="name">Your Name</label>
        <input type="text" name="name" required>

        <label for="email">Your Email</label>
        <input type="email" name="email" required>

        <label for="message">Your Message</label>
        <textarea name="message" rows="6" required></textarea>

        <button type="submit">Send Message</button>
    </form>

    <div class="store-info">
        <h3>📍 Visit Us</h3>
        <p>BookNest HQ, 123 Book Lane, Readerville, IN 40001</p>

        <h3>📞 Call Us</h3>
        <p>+1 (555) 123-4567</p>

        <h3>✉️ Email Us</h3>
        <p>support@booknest.com</p>
    </div>
</div>


</body>
</html>
