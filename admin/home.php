

<?php
include ("include_files/connection.php");
include "include_files/top_header.php";


         
?> 




<?php 
if(isset($_POST['send'])){
  
    $msg=$_POST['msg'];
    if(!$msg==""){
    $qq="INSERT into groupchat(user_id,msg) VALUES('$_SESSION[user_id]','$msg')";
    $runquery = mysqli_query($connection, $qq) or die(mysqli_error($connection));
    header("location:home.php");
     }
    else{
    echo "<script>alert('Enter message.');</script>";
    }
}


?>


      <!-- Left side column. contains the logo and sidebar -->
      <?php include "include_files/side_bar_menu.php";?>
      <!-- Left side column. contains the logo and sidebar -->
     

     
      <!-- Left side column. contains the logo and sidebar -->
    

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard 
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Home</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
      <h2 class="text text-primary">Welcome To Group Chat website </h2>

    <?php
      $query = "SELECT * FROM  user WHERE id=$_SESSION[user_id]";
           $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
           $fetch=mysqli_fetch_array($run_query);

?>
<h3>

 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <?php echo $fetch['name'] ?></h3>



<?php 


          $image=$fetch['image'];
        if($image=="" || empty($image))
        {
         echo "<img src='uploaded_images/default.png' width='250px' height='250px' class='img-circle'>";
        }else {
                        ?>

           <img src="<?=$image?>" class="img-circle" width='250px' height='250px' alt="User Image"><?php  } ?>


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   