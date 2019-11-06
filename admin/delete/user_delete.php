<?php 
		include('../include_files/connection.php');

		$id= $_REQUEST['id'];

		   $query = "SELECT * FROM groupchat WHERE id=$id";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $fetch=mysqli_fetch_array($run_query);
            $groupid =$fetch['group_id'];

		$query = "DELETE from groupchat where id='$id'";
		$run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
		if ($run_query) 
		{
			header("location:../groupchat.php?groupid=$groupid");
		}

 ?>