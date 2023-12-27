<?php
   include('../../config.php');

   session_start();

   if(!isset($_SESSION['login_user'])) {
    header('Location: ../login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="payment.css">

    <title>Payment Limit</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><div class="logo"></div></a>

        <div class="nav-content">
          <a href="../../logout.php">
          <div class="button-logout"></div>
          </a>
        </div>

      </div>
    </nav>
    
    <div class="square">
        <div class="fill_square">
            <h1>6700 000 899 992</h1>
            <p>you can transfer with,dana,bca,bni,etc.</p>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="proof_payment">You can upload proof of payment</label>
                <input type="file" name="proof" class="form-control" id="proof_payment">
                <button name="button" class="btn btn-dark">Send</button>
            </form>
              <?php
              if(isset($_POST['button'])) {
                $name = $_SESSION['name'];
                $payment = $_SESSION['payment'];
                $dateNow = date('Y-m-d H:i:s');

                $fileName = $_FILES['proof']['name'];
                $tempName = $_FILES['proof']['tmp_name'];
                $dirUpload = '../Admin/proof_payment/';
                $format = pathinfo($fileName, PATHINFO_EXTENSION);
                $newName = $name.'.'.$format;
                $typesImage = array('jpg','png','jpeg','jfif');

                if(in_array($format,$typesImage)) {

                 $uploaded = move_uploaded_file($tempName, $dirUpload.$newName);

                 $sql = "INSERT INTO `history_payment`(name,payment,payment_date,proof_payment,description) VALUE('$name','$payment','$dateNow','$newName','Initial Costs')";
               
                 $query = mysqli_query($db,$sql);

                if($query) {
                    echo '<script>alert("Uploaded Sending")</script>';
                  } else {
                     echo '<script>alert("Upload Failed")</script>';
                  }

                } else {
                  echo '<script>alert("This format wrong")</script>';
                }

              }
            ?>  
        </div>
    </div>
    <script src="../../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>



