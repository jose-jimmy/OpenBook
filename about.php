<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <!-- Favicon -->
   <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
   <link rel="manifest" href="./favicon/site.webmanifest">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/buynow.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>about us</h3>
      <p> <a href="home.php">home</a> / about </p>
   </div>

   <section class="about">

      <div class="flex">

         <div class="image">
            <img src="./Images/13.png" alt="">
         </div>

         <div class="content">
            <h3>why choose us?</h3>
            <p>By using OpenBook the users can either find out the nearest library were they can get the book they are looking for and make a direct pickup or get it delivered to their doorstep by paying the delivery fee.</p>
            <p>OpenBook also has the facility to search for ebooks and get a pdf of the same thanks to the google books API. This helps the users to verify the books before ordering. </p>
            <a href="contact.php" class="btn">contact us</a>
         </div>

      </div>

   </section>



   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>