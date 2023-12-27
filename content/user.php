<?php
  include('../config.php');
  session_start();

  echo $_SESSION['username'];

  if(!isset($_SESSION['login_user'])) {
    header('Location: ../login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <link rel="stylesheet" href="../css/user.css">

    <title>Welcome</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-success bg-success">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">buKOS</a>

        <div class="nav-content">
          <p>Hello, <?php echo $_SESSION['username']; ?></p>
          <a href="../logout.php">
          <div class="button-logout"></div>
          </a>
        </div>

      </div>
    </nav>


    <div class="container">

    <h1>Welcome to buKOS</h1>
    <h2>We have 20 rooms, so for male 10 rooms have 2 floors , and for male 10 rooms have 2 floors also</h2>
    <h3>you can choose this option for</h3>

      <div class="row">
        <div class="col-lg-6">
          <a href="male/male.php">
          <div class="male"></div>
          </a>
        </div>
        <div class="col-lg-6">
          <a href="female/female.php">
          <div class="female"></div>
          </a>
        </div>
      </div>
    </div>

  <script src="../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>