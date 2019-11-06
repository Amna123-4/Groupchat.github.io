<?php include("include_files/connection.php"); ?>
<?php
$getid=$_GET['userid'];
$query = mysqli_query($connection,"SELECT * FROM user WHERE id='$getid'") or die(mysqli_error($connection));
    $res = mysqli_fetch_array($query);

    $sts=$res['status'];
    if($sts=='enabled'){
    $query = mysqli_query($connection,"UPDATE user SET status='disabled' WHERE id='$getid'") or die(mysqli_error($connection));
    header("location:user.php");
    }
    else{
    $query = mysqli_query($connection,"UPDATE user SET status='enabled' WHERE id='$getid'") or die(mysqli_error($connection));
    header("location:user.php");
    }

?>