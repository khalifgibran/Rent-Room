<?php
  include('../../config.php');
  session_start();

  if(!isset($_SESSION['login_user'])) {
    header('Location: ../../login.php');
  }
    

  $querySelect = mysqli_query($db,"SELECT * FROM `room-male`");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="../../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <link rel="stylesheet" href="../../css/body_gender.css">

    <title>Welcome</title>
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

<div class="square_username">

    <h5 class="welcome_username">Welcome, <?php echo $_SESSION['username']; ?> </h5>
    <p class="p_username">We provide rent room among them namely we have  20 rooms divided by 2 for male and female so for male and female have 2 floors then 5 for 1 floors and 5 for 2 floors <br><br> You can click rent now in below</p>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Rent Now</button>

</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Men's room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<div class="row">
        	<p class="onest">1st Floor</p>
        	<div class="square first_floor col-lg-6">
        		<div class="">1</div>
        		<div class="">2</div>
        		<div class="">3</div>
        		<div class="">4</div>
        		<div class="">5</div>
        	</div>

        	<p class="twost">2st Floor</p>
        	<div class="square second_floor col-lg-6">
        		<div class="">6</div>
        		<div class="">7</div>
        		<div class="">8</div>
        		<div class="">9</div>
        		<div class="">10</div>
        	</div>
        </div>
      </div>

      <div class="desc_ row">
        <p>Description</p>
        <div class="desc col-lg-12">
          <div class="booked">Booked</div>
          <div class="none">None</div>
        </div>
      </div>
      <div class="modal-footer">

        <a href="../aggrement.php" class="btn">Book</a>

      </div>
    </div>
  </div>
</div>
  <script src="../../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>

<?php  
  $data = array();

   while($book = mysqli_fetch_array($querySelect)) {
      array_push($data,$book['room']);
    }

    echo "<script>
      let array = ".json_encode($data).";
           const square = document.querySelectorAll('.square_color');
                for(let i = 1; i <= square.length; i++) {     
                  array.forEach(function(index,value) {
                      if(index == i) {
                        square[index - 1].classList.add('square_colors');
                      }
                    });
              }              
    </script>";
?>