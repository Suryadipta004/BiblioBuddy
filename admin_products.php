<?php
include 'config.php';

session_start();
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliobuddy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/admin_style.css">
</head>

<body>
    <?php include 'admin_header.php' ?>
    <section class="add-products">
        <h1 class="title">shop products</h1>
        <form action="">
            <h3>add products</h3>
            <input type="text" class="box" placeholder="enter product name" required>
            <input type="number" class="box" placeholder="enter product price (jpg,jpeg,png)" required>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>
    </section>
    <section class="show-products">
        <div class="box-container">
            <div class="box">
                <img src="uploaded_img/" alt="">
                <div class="name"></div>
                <div class="price"></div>
                <a href="" class="option-btn">update</a>
                <a href="" class="delete-btn">delete</a>
            </div>
        </div>
    </section>

</body>
<script src="js/admin_script.js"></script>


</html>