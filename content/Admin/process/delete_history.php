<?php
    include('../../../config.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM `history_payment` WHERE id= $id";
        $query = mysqli_query($db,$sql);

        if($query) {
			echo('Succes');

			header('Location: ../history_payment/history_payment.php');
		} else {
			die("Delete Failed");
		}
	} else {
		die("404 NOT FOUND");
	}
?>
