<?php  
  include('../config.php');
  session_start();

if(!isset($_SESSION['login_user'])) {
  header('Location: ../login.php');
}

$queryGender = mysqli_query($db,"SELECT username,gender FROM users");
$gender = $queryGender->fetch_all(MYSQLI_ASSOC);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/aggrement.css">

    <title>Aggrement</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
      <a class="navbar-brand" href="#"><div class="logo"></div></a>

        <div class="nav-content">
          <a href="../logout.php">
          <div class="button-logout"></div>
          </a>
        </div>

      </div>
    </nav>

    <div class="container">
      <div class="content">
        <h2>Rules</h2>
        <h5>Once again, Welcome to our website where we open a rental place so you can order here before ordering, you better read the rules first for our convenience / goodness and also thank you.</h5>
        <br>
        <h4>Rules for each occupant</h4>
        <ol>
          <li>If you Broken bed – Must be fine Rp. 1,500,000</li>
          <li>If you Broken mattress – Must be fine  Rp 500,000</li>
          <li>If you Broken pillow – Must be fine  Rp 100,000</li>
          <li>If you Light bulb – Must be fine  Rp 30,000 </li>
          <li>If you Desk/chair/cabinet – Must be fine  Rp 150,000</li>
          <li>If you Air conditioner – Must be fine  Rp 1,500,000</li>
          <li>If you Trash can – Must be fine  Rp 25,000</li>
          <li>If you  Window – Must be fine Rp 1,000,000</li>
        </ol>
      </div>
    </div>

    <br>

    <div class="mb-2">

      <?php  
          foreach($gender as $val_gender) {
            if($_SESSION['username'] == $val_gender['username'] && $val_gender['gender'] == 'Male') {
            ?>  
              <form action="male/aggrement_process.php" method="POST">
            <?php
            } else if($_SESSION['username'] == $val_gender['username'] && $val_gender['gender'] == 'Female') {
            ?>  
              <form action="female/aggrement_process.php" method="POST">
            <?php
            }
          }
      ?>

      <input name="check" type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">I Agree for this</label>
      <br><br>


      <button name="submit" type="submit" class="btn">Next</button>
      </form>
    </div>

    <script src="../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>



