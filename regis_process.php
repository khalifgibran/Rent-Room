<?php
  include('config.php');
  
  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender_select'];
    $age = $_POST['age'];
    $hometown = $_POST['hometown'];

    $sql = "INSERT INTO users(username,password,email,gender,age,hometown) VALUE('$username','$password','$email','$gender',$age,'$hometown')";

    $query = mysqli_query($db,$sql);
    
    if($query) {
      header('Location: login.php');
    }
  }
?>