<?php   session_start();
		include('../include_files/connection.php');

		$id= $_REQUEST['groupid'];
		$uid=$_SESSION['user_id'];


		$query = "DELETE from user_group WHERE group_id='$id' AND user_id=$uid";
		$run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
		if ($run_query) 
		{
			header("location:../group.php");
		}

 ?>