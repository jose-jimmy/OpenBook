<?php
include './config.php';
if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  $user_typee = $_POST['user_type'];


  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

  if (mysqli_num_rows($select_users) > 0) {
    $message[] = 'user already exists';
  } else {
    if ($pass != $cpass) {
      $message[] = 'confirm password does not match';
    } else {
      mysqli_query($conn, "INSERT INTO `USERS`(name,email,password,user_type) VALUES('$name','$email','$pass','$user_typee')") or die('query failed');
      $message[] = 'registered successfully';
      header('location:login.php');
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Open Book</title>
  <link rel="icon" href="./Images/openbook.png" sizes="20x20" />

  <!-- custom stylesheet link -->
  <link rel="stylesheet" href="./css/style.css">

  <!--Bootstrap cdn link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
  <link rel="manifest" href="./favicon/site.webmanifest">

  <!--font awesome cdn link -->
  <script src="https://kit.fontawesome.com/d9987286dd.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
  }
  ?>

  <section class="vh-100" style="background-color: #032140;" id="fadeshow1">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="./Images/signup.jpg" class="img-fluid" alt="Sample image">

                </div>

                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <!-- Form section -->

                  <form class="mx-1 mx-md-4" action="" method="post">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0 ">
                        <input type="text" name="name" class="form-control" placeholder="Name" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" placeholder="Email-ID" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-users fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <select class="form-control" name="user_type" required>
                          <option>Select your role</option>
                          <option>user</option>
                          <option>admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" name="submit" value="Signup" class="btn btn-primary">
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <label class="form-check-label" for="form2Example3">
                        Already a user? login instead <a href="./login.php" style="text-decoration: none;">Login</a>
                      </label>
                    </div>

                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- loader  -->

  <div class="loader">
    <img src="./Images/loader-img.gif" alt="">
  </div>


  <!--Loader js file-->
  <script src="./js/loader.js"> </script>
</body>

</html>