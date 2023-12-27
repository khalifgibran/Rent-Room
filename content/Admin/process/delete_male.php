<?php
    include('../../../config.php');
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM `room-male` WHERE id= $id";
        $query = mysqli_query($db,$sql);

        if($query) {
			echo('Succes');

			header('Location: ../listroom/listroom_male.php');
		} else {
			die("Delete Failed");
		}
	} else {
		die("404 NOT FOUND");
	}
?>