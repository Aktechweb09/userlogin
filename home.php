<?php
     session_start();
         $id = $_SESSION['id'];
         if(empty($id)){
         header('location:login.php');

         exit();
          } 
 ?>




 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your Website</title>
    <style type="text/css">
        /* Reset some default styles for better consistency */
body, h1, h2, p {
    margin: 0;
    padding: 0;
}

/* Apply some basic styling to header */
header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

header nav ul {
    list-style: none;
    text-align: center;
}

header nav ul li {
    display: inline;
    margin: 0 20px;
}

header nav ul li a {
    text-decoration: none;
    color: #fff;
}

/* Style the hero section */
.hero {
    background-image: url('your-hero-image.jpg');
    background-size: cover;
    text-align: center;
    padding: 100px 0;
    color: #fff;
}

.hero h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

.hero p {
    font-size: 18px;
}

/* Style the contact section */
.contact {
    background-color: #f4f4f4;
    text-align: center;
    padding: 50px 0;
}

.contact h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Style the footer */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

/* Add more styles for gallery, about, and login sections as needed */

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#login">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Welcome to Your Website</h1>
        <p>Your website's tagline goes here.</p>
    </section>

    <section class="gallery">
        <!-- Gallery content goes here -->
    </section>

     <h1>Welcome to home page </h1>

    <?php echo $id; ?>

    <section class="contact">
        <h2>Contact Us</h2>
        <p>You can reach us at: contact@example.com</p>
    </section>

    <footer>
        <p>&copy; 2023 Your Website</p>
    </footer>
</body>
</html>
