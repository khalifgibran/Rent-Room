<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <link rel="stylesheet" href="css/regis.css">

    <title>Registration</title>
  </head>
  <body>
    <div class="clip-path"></div>
    <img class="img-vector" src="icons/icon-ui/Register.svg" height="450" width="550" alt="">
    <div class="container">

      <h2><b>CREATE ACCOUNT</b></h2>

      <hr class="first">

    <form action="regis_process.php" method="POST">
      <div class="input-group mb-3">
        
         <input name="username" type="text" class="form-control" id="username" placeholder="Username">
      </div>

      <div class="input-group mb-3">
       
         <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>

      <div class="input-group mb-3">
         <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
      </div>

      <div class="input-group mb-3">
       
        <select name="gender_select" class="form-select" aria-label="Default select example">
          <option name="one" value="Male">Male</option>
          <option name="two" value="Female">Female</option>
        </select>
      </div>

      <div class="input-group mb-3">
         <input name="age" type="number" class="form-control" id="number"  placeholder="Age">
      </div>

      <div class="input-group mb-3">
         <input name="hometown" type="text" class="form-control" id="hometown" placeholder="Hometown">
      </div>

        <button name="submit" type="submit" class="btn">Regist Now</button>
    </form>
  </div>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <script src="bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>