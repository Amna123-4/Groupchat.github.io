<?php include("include_files/connection.php"); ?>
<?php
$getid=$_GET['id'];
$query = mysqli_query($connection,"SELECT * FROM user WHERE id='$getid'") or die(mysqli_error($connection));
    $res = mysqli_fetch_array($query);

    $sts=$res['visibility'];
    if($sts=='on'){
    $query = mysqli_query($connection,"UPDATE user SET visibility='off' WHERE id='$getid'") or die(mysqli_error($connection));
    header("location:profile.php");
    }
    else{
    $query = mysqli_query($connection,"UPDATE user SET visibility='on' WHERE id='$getid'") or die(mysqli_error($connection));
    header("location:profile.php");
    }

?>