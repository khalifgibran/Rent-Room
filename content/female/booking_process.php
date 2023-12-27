<?php
    include('../../config.php');
      session_start();

      if(!isset($_SESSION['login_user'])) {
        header('Location: ../../login.php');
      }
  
    if(isset($_POST['submit'])) {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $street_address = $_POST['street_address'];
      $city = $_POST['city'];
      $region = $_POST['region'];
      $postal_code = $_POST['postal_code'];
      $country = $_POST['country'];
      $phone_number = $_POST['number-telp'];
      $start_move_in = date('Ymd',strtotime($_POST['when']));
      $floor = $_POST['floor'];
      $room = $_POST['room'];
      $payment = $_POST['payment'];

      $_SESSION['name'] = $first_name.$last_name;
      $_SESSION['payment'] = $payment;

      $expired = date('Ymd', strtotime('+1 month',strtotime($_POST['when'])));
      echo $expired;

      $querySelect = mysqli_query($db,"SELECT * FROM `room_female`");
      $dataF = $querySelect->fetch_all(MYSQLI_ASSOC);

      $data = array();
      foreach($dataF as $book) {
        array_push($data,$book['room']);
      }

      if(in_array($room,$data)) {

        echo "<script>alert('Someone has filled it');</script>";
        header("Location: booking.php");

      } else {

        if($floor == 1) {
          if($room <= 5) {
            $sqlInsert = "INSERT INTO `room_female`(first_name,last_name,street_address,city,region,postal_code,country,phone_number,start_move_in,floor,room,expire) VALUE('$first_name','$last_name','$street_address','$city','$region','$postal_code','$country','$phone_number','$start_move_in','$floor','$room','$expired')";

             $queryInsert = mysqli_query($db,$sqlInsert);

             if($dateNow >=  $expired && $dateNow <=  $expired  ) {
              $queryDelete = mysqli_query($db,"DELETE FROM `room_female` WHERE expire= '$dateNow'");
              }

          } else {
            echo "<script>alert('Someone filled incorrect room');</script>";
          }
        } else if($floor == 2) {
           if($room >= 6) {
            $sqlInsert = "INSERT INTO `room_female`(first_name,last_name,street_address,city,region,postal_code,country,phone_number,start_move_in,floor,room,expire) VALUE('$first_name','$last_name','$street_address','$city','$region','$postal_code','$country','$phone_number','$start_move_in','$floor','$room','$expired')";

            $queryInsert = mysqli_query($db,$sqlInsert);
           
            if($dateNow >=  $expired && $dateNow <=  $expired  ) {
              $queryDelete = mysqli_query($db,"DELETE FROM `room_female` WHERE expire= '$dateNow'");
              }
          } else {
           echo "<script>alert('Someone filled incorrect room');</script>";
          }
         }

        header("Location: payment.php");
      }

      }
    ?>