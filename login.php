<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
    </head>
    <body>

      <div class="clip_path"></div>
      <a href="landing_page.html" ><div class="logo"></div></a>
      <img class="img-login" src="icons/icon-ui/Login.svg" height="500" width="560" alt="">
      <div class="kotak-login">
      <h3><b>LOGIN</b></h3>
      <form action="login_process.php" method="POST">

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input name="username" type="text" class="form-control" id="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="mb-2">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember Me</label>

          <a class="create-account" href="regis.php">Create Account?</a>
        </div>
        
        <button name="submit" type="submit" class="btn">Login</button>
   </form>
    <script src="bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>