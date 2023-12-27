<?php
include('../../config.php');
  
if(isset($_POST['check'])) {
    header('Location: booking.php');
} else {
	header('Location: ../process/aggrement.php');
}
?>