<?php   session_start();
		include('../include_files/connection.php');

		$uid= $_REQUEST['uid'];
		$gid= $_REQUEST['gid'];
		$aid=$_SESSION['user_id'];


		$query = "DELETE from user_group WHERE group_id='$gid' AND user_id=$uid AND admin_id=$aid";
		$run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
		if ($run_query) 
		{
			header("location:../show_users.php?id=<?php echo $gid;?>");
		}

 ?>