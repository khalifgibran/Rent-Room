<?php  
  include('../../config.php');
  session_start();

if(!isset($_SESSION['login_user'])) {
  header('Location: ../../login.php');
}

$querySelect = mysqli_query($db,"SELECT * FROM `room_female`");
$dataF  = $querySelect->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="../../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <link rel="stylesheet" href="booking.css">

    <title>Booking Room</title>
  </head>
  <body>
    <div class="container">

      <h2>Booking Room</h2>

      <hr>

    <form action="booking_process.php" method="POST">
      <div class="input-group mb-3">
        <label for="name">Name :</label>
         <div class="row">
            <div style="width: 20rem;" class="col-lg-6">
               <input name="first_name" type="text" class="form-control" id="name" placeholder="First Name" required>
            </div>
            <div style="width:20rem;" class="col-lg-6">
               <input name="last_name" type="text" class="form-control" id="name" placeholder="Last Name" required>
            </div>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="name">Current Address :</label>

          <div class="row">
          <div style="width: 450px;" class="first-field col-lg-12">
              <input name="street_address" type="text" class="form-control" id="address" placeholder="Street Address" required>
          </div>
          </div>

         <div class=" row">
            <div class=" second-field col-lg-6">
               <input name="city" type="text" class="form-control" id="address" placeholder="City" required>
            </div>
            <div class="second-field col-lg-6">
               <input name="region" type="text" class="form-control" id="address" placeholder="Region" required>
            </div>
          </div>

          <div class=" row">
            <div class="three-field col-lg-6">
               <input name="postal_code" type="text" class="form-control" id="address" placeholder="Postal Code" required>
            </div>
            <div class="three-field  col-lg-6">
               <input name="country" type="text" class="form-control" id="address" placeholder="Country" required>
            </div>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="number-telp">Phone Number :</label>
          <input name="number-telp" type="number" class="form-control" id="number-telp" placeholder="Your Phone Number" required >
      </div>

      <div class="input-group mb-3">
        <label for="when">When do you want to move in?</label>
          <input name="when" type="date" class="form-control" id="when" required>
      </div>

      <div class="input-group mb-3">
        <label for="floor">Floor :</label>
        <select style="margin-left: 10px;" name="floor" class="form-select" aria-label="form-select-lg example" required>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </div>

      <div class="input-group mb-3">
        <label for="room">Room :</label>
        <select style="margin-left: 10px;" id="room" name="room" class="form-select" aria-label="form-select-lg example" required>

          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>

        </select>
      </div>

      <div class="input-group mb-3">
        <label for="payment">Payment :</label>
        <select style="margin-left: 10px;" id="payment" name="payment" class="form-select" aria-label="form-select-lg example" required>

          <option value="2000000">Rp. 2.000.000 / Initial costs</option>

        </select>
      </div>


      <br>
      <hr class="hr-b">

        <button name="submit" type="submit" class="btn">Booking Now</button>
    </form>
  </div>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <script src="../../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>