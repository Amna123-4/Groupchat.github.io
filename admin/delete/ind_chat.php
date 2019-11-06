<?php 
		include('../include_files/connection.php');

		$id= $_REQUEST['id'];

		   $query = "SELECT * FROM ind_chat WHERE id=$id";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $fetch=mysqli_fetch_array($run_query);
            $userid =$fetch['opp_id'];

		$query = "DELETE from ind_chat where id='$id'";
		$run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
		if ($run_query) 
		{
			header("location:../userchat.php?userid=$userid");
		}

 ?>