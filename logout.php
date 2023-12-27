<?php  
 session_start();
 $_SESSSION = [];
 session_unset();
 session_destroy();

 header('Location: login.php');
 exit;
?>