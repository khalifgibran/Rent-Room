 <?php
      include('config.php');
      session_start();

      if($_SERVER["REQUEST_METHOD"] == 'POST' ) {
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

        $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password' ";
        $query = mysqli_query($db,$sql);

        $queryGender = mysqli_query($db,"SELECT username,gender FROM users");
        $gender = $queryGender->fetch_all(MYSQLI_ASSOC);

        $count = mysqli_num_rows($query);
        $checkUser = mysqli_query($db,"SELECT * FROM users WHERE username = '$username'");

        if($username == 'admin' && $password == 'admin') {

          $_SESSION['username'] = $username;
          $_SESSION['login_user'] = true;
          header('Location: content/Admin/dashboard.php');
        } else if($count == 1) {

          $_SESSION['username'] = $username;
          $_SESSION['login_user'] = true;

          foreach($gender as $val_gender) {
            if($_SESSION['username'] == $val_gender['username'] && $val_gender['gender'] == 'Male') {
              echo $count;  
              header('Location: content/male/male.php');
            } else if($_SESSION['username'] == $val_gender['username'] && $val_gender['gender'] == 'Female') {
              header('Location: content/female/female.php');
            }
          }
        
        } else {
          header('Location: login.php');   
        }
      }

  ?>