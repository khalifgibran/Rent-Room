<?php
  include('../config.php');
  session_start();

  if(!isset($_SESSION['login_user'])) {
    header('Location: ../login.php');
  }

  $queryM = mysqli_query($db,"SELECT * FROM `room-male`");
  $dataM   = $queryM->fetch_all(MYSQLI_ASSOC);

  $queryF = mysqli_query($db,"SELECT * FROM `room-female`");
  $dataF   = $queryF->fetch_all(MYSQLI_ASSOC);

  $queryHistory = mysqli_query($db,"SELECT * FROM `history_payment`");
  $dataH   = $queryHistory->fetch_all(MYSQLI_ASSOC);

  $dateY = date('Y');
  $dateM = date('m');
  $dateD = date('d');

  $expired = date('Ymd', strtotime('+1 month',strtotime($dateY.$dateM.$dateD)));

  $payment = 0;
  foreach($dataH as $const_m) {
      $payment += $const_m['payment'];
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../css/admin.css" rel="stylesheet">

    <title>Admin Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand"></a>

        <a href="../logout.php">
          <div class="logout"></div>
        </a>

      </div>
    </nav>

    <div class="side-bar">
      <div class="header">
          <img src="../icons/admin.svg" />
          <h3>Admin</h3>
      </div>
      <div class="main">
          <ul>
            <li class="dashboard"><div></div><a style="text-decoration: none; color:white;" class="link" id="link-dashboard">Dashboard</a></li>
          </ul>
      </div>
    </div>

    <div class="Page">

    <div class="color-display">
        <div class="yellow">
            <div class="total-male"></div>
            <h2><?php echo mysqli_num_rows($queryM); ?></h2>
            <span><p>Male Room</p></span>
        </div>
        <div class="green">
            <div class="total-female"></div>
            <h2><?php echo mysqli_num_rows($queryF); ?></h2>
            <span><p>Female Room</p></span>
        </div>

        <div class="blue">
            <div class="monthly"></div>
            <h2><?php echo $payment; ?></h2>
            <span><p>Monthly Income</p></span>
        </div>

        <div class="red">
            <div class="yearly"></div>
            <h2><?php echo $payment; ?></h2>
            <span><p>Yearly Income</p></span>
        </div>
    </div>
      <div class="table-list">
        <h2>Room Male</h2>
 <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Floor</th>
        <th scope="col">Room</th>
        <th scope="col">Expire Payment</th>
        <th scope="col">Status</th>
        <th scope="col">Optional</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($dataM as $room_male) {   ?>
      <tr>
        <th scope="row"><?php echo $room_male['room_id']; ?></th>
        <td><?php echo $room_male['first_name'] . $room_male['last_name']; ?></td>
        <td><?php echo $room_male['floor'];   ?></td>
        <td><?php echo $room_male['room'];   ?></td>
        <td><?php echo date('Y-m-d', strtotime('+1 month')); ?></td>
        <td><div class="btn btn-dark">Active</div></td>
        <td><a class="btn btn-dark" href='male/delete_male.php?id="<?php echo $room_male['id']; ?>"'>Delete</a></td>
      </tr>
     <?php  }  ?>
    </tbody>
    </table>

    <br>

    <h2>Room Female</h2>
    <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Floor</th>
        <th scope="col">Room</th> 
        <th scope="col">Expire Payment</th>
        <th scope="col">Status</th>
        <th scope="col">Optional</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($dataF as $room_female) {   ?>

      <tr>
        <th scope="row"><?php echo $room_female['room_id']; ?></th>  
        <td><?php echo $room_female['first_name'] . $room_female['last_name']; ?></td>
        <td><?php echo $room_female['floor'];   ?></td>
        <td><?php echo $room_female['room'];   ?></td>
  
        <td><?php echo date('Y-m-d', strtotime('+1 month')); ?></td>
        <td><div class="btn btn-dark">Active</div></td>
        <td><a class="btn btn-dark" href='female/delete_female.php?id="<?php echo $room_female['id']; ?>"'>Delete</a></td>
      </tr>
     <?php }  ?>
    </tbody>
    </table>
    </div>
  </div>
  <script src="../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 
  </body>
</html>