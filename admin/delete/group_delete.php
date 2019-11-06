<?php 
		include('../include_files/connection.php');

		$id= $_REQUEST['groupid'];


		$query = "DELETE from groups where id='$id'";
		$run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
		if ($run_query) 
		{
			header("location:../group.php");
		}

 ?>